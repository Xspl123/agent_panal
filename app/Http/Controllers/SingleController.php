<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\SelectService;
use App\Services\InsertService;
use App\Services\UpdateService;
use App\Services\DeleteService;
use App\Helpers\InsertWebServerUrl;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDatas;
use App\Helpers\globalData;


class SingleController extends Controller
{
    protected $SelectService;
    protected $InsertService;
    protected $UpdateService;
    protected $DeleteService;
    public function __construct(SelectService $SelectService, InsertService $InsertService,UpdateService $UpdateService,DeleteService $DeleteService)
    {
        $this->SelectService = $SelectService;
        $this->InsertService = $InsertService;
        $this->UpdateService = $UpdateService;
        $this->DeleteService = $DeleteService;
    }


  ///*************************** for get the agent Details ****************************
    public function agentDetails()
     {
     	 $auth = auth()->user()->user;
         $helper = new globalData();
         $vicidial_users = 'vicidial_users';
        $agentDetails = $this->SelectService->getData($vicidial_users,'*','user',$auth);
         return[
            'status'=>'success',
            'agentDetails'=>$agentDetails
            ];
     }
     //*******************************************  END **************************************

     //****************** function for get all pausecode related to campaign   **********************************************************
     public function getPauseCodes(Request $request)
     {
     	$request->validate([
                'campaign_id' => 'required',
            ]);
     	$campaign_id = $request->campaign_id;
     	 $pausecode = 'vicidial_pause_codes';
        $pausecode = $this->SelectService->getWhereData($pausecode,'*','campaign_id',$campaign_id);
          return[
            'status'=>'success',
            'pausecode'=>$pausecode
            ];
     }
     //*******************************************  END **************************************

    // *********************** function for start the pause code************************************************
     public function pauseStart(Request $request)
     {
        $request->validate([
                'campaign_id' => 'required',
                'pausecode' => 'required',
            ]);
        $campaign_id = $request->campaign_id;
        $pasuecode = $request->pausecode;
        $auth = auth()->user()->user;
        $helper = new globalData();
        $live_agents = 'vicidial_live_agents';//update pause code in live agent in live table
        $requestData = array('pause_code'=>$pasuecode,'last_update_time'=>$helper->NOW_TIME);
        $this->UpdateService->updateData($live_agents,'user',$auth,$requestData);
        $vicidial_agent_logs = 'vicidial_agent_log'; //get data
        $agentdata = $this->SelectService->getData($vicidial_agent_logs,'pause_epoch','user',$auth);
        $pause_epoch = $helper->StarTtimE -  $agentdata->pause_epoch;
        $requestData = array('pause_sec'=>$pause_epoch);
        $this->UpdateService->updateLastData($vicidial_agent_logs,'user',$auth,$requestData);//update data
         $request_array= array('user'=>$auth,'campaign_id'=>$campaign_id,'server_ip'=>$helper->server_ip,'event_time'=>$helper->NOW_TIME,'pause_type'=>'AGENT','pause_epoch'=>$helper->StarTtimE);
        $this->InsertService->insertData($vicidial_agent_logs,$request_array);
         return[
                'status'=>'success',
                'message'=>'update successfully',
            ];
     }
     //*******************************************  END **************************************

     // *************************** function for cancel pause code***************
     public function pauseStop(Request $request)
     {
        $request->validate([
                'campaign_id' => 'required',
            ]);
         $campaign_id = $request->campaign_id;
        $auth = auth()->user()->user;
        $helper = new globalData();
        $live_agents = 'vicidial_live_agents';//update pause code in live agent in live table
        $requestData = array('pause_code'=>'','last_update_time'=>$helper->NOW_TIME);
        $this->UpdateService->updateData($live_agents,'user',$auth,$requestData);
        $vicidial_agent_logs = 'vicidial_agent_log'; //get data
        $agentdata = $this->SelectService->getData($vicidial_agent_logs,'pause_epoch','user',$auth);
        $pause_epoch = $helper->StarTtimE -  $agentdata->pause_epoch;
        $requestData = array('pause_sec'=>$pause_epoch);
        $this->UpdateService->updateLastData($vicidial_agent_logs,'user',$auth,$requestData);//update data
        $request_array= array('user'=>$auth,'campaign_id'=>$campaign_id,'server_ip'=>$helper->server_ip,'event_time'=>$helper->NOW_TIME,'pause_type'=>'AGENT','pause_epoch'=>$helper->StarTtimE);
         $this->InsertService->insertData($vicidial_agent_logs,$request_array);
        return[
                'status'=>'success',
                'message'=>'update successfully',
            ];
     }
     //*******************************************  END **************************************

    // ********************  function for Active the Agents *******************
     public function activeAgent()
     {
        $helper = new globalData();


     }

     //*********************** function for pause the Agents***************************** */

     public function pauseAgent()
     {

     }
}