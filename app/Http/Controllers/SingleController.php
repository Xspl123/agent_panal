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
  ///***************** for get the agent Details*********
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
     //get all pausecode of Campaign

     public function getPauseCodes(Request $request)
     {
     	$request->validate([
                'campaign_id' => 'required',
            ]);
     	$campaign_id = $request->campaign_id;
     	 $pausecode = 'vicidial_pause_codes';
        $agentDetails = $this->SelectService->getData($pausecode,'*','campaign_id',$campaign_id);



     }

}