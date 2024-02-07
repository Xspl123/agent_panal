<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\SelectService;
use App\Services\InsertService;
use App\Services\UpdateService;
use App\Services\DeleteService;

use App\Helpers\InsertWebServerUrl;
use Illuminate\Support\Facades\Auth;
use App\Models\VicidialUser;
use App\Models\SystemSetting;
use App\Models\VicidialUserGroup;
use App\Models\vicidial_campaign;
use App\Http\Requests\StoreDatas;
use App\Helpers\globalData;
use Illuminate\Support\Facades\Log;


class LoginController extends Controller
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

    // Login function
    public function login(Request $request)
    {
    // try {
            $request->validate([
                'user' => 'required',
                'password' => 'required',
                'campaign_id' => 'required',
                'phonelogin' => 'required',
                'phonepass' =>'required',
            ]);
            $helper = new globalData();
            $tablename = 'vicidial_users';
                $user = $request->user;
                $password = $request->password;
                $campaign_id = $request->campaign_id;
                $phonelogin = $request->phonelogin;
                $phonepass = $request->phonepass;

                $userdata =array('user'=> $user,'pass'=>$password);
                $loginUserData = $this->SelectService->getData2Where($tablename,['*'],$userdata);

                if (!$loginUserData) {
                    return [
                        'status' => 'failed',
                        'message' => 'User and Password not found.',
                    ];
                }
                if ($loginUserData->active === 'N') {
                    return [
                        'message' => 'User is deactivated. Please contact the Administrator.',
                        'status' => 'failed',
                    ];
                }
                // get data from  Phones table *******************
                    $phoneData = $this->phoneLogin($phonelogin,$phonepass);
                    if ($phoneData === null) {
                        return [
                            'message' => 'The Phone credentials are incorrect.',
                            'status' => 'failed',
                        ];
                    }
                    if ($phoneData->active === 'N') {
                        return [
                            'message' => 'Phone  is deactivated. Please contact the Administrator.',
                            'status' => 'failed',
                        ];
                    }


                //********** END */
                $extension = $phoneData->protocol.'/'.$phoneData->extension;
                $ext_context = $phoneData->voicemail_dump_exten;
                $user_group = $loginUserData->user_group;
                $user_level = $loginUserData->user_level;
                $get_conf_exten =  $this->getConferencesDatas($extension,$user);
                //insert data in agent_logs_table
                $vicidial_agent_log = 'vicidial_agent_log';
                $request_array=array('user'=>$user,'campaign_id'=>$campaign_id,'server_ip'=>$helper->server_ip,'event_time'=>$helper->NOW_TIME,'user_group'=>$user_group,'pause_epoch'=>$helper->StarTtimE,'pause_sec'=>'0','wait_epoch'=>$helper->StarTtimE,'pause_type'=>'AGENT','sub_status'=>'LOGIN');
               Log::channel('agent_log_table')->info('Agent Logs: ' . json_encode($request_array));
                $this->InsertService->insertData($vicidial_agent_log,$request_array);
                
                //insert Data in vicidial_live_agents table ***
                $vicidial_live_agents = 'vicidial_live_agents';
                $checkuser = 'user';
                $loginPhoneData = $this->DeleteService->deleteData($vicidial_live_agents,$checkuser,$user);//delete live agent table if user in db...
                $requestData = array('user'=>$user,'extension'=>$extension,'server_ip'=>$helper->server_ip,'conf_exten'=>$get_conf_exten->conf_exten,'status'=>'PAUSED','lead_id'=>'0','campaign_id'=>$campaign_id,'random_id'=>$helper->random,'user_level'=>$user_level,'last_call_time'=>$helper->NOW_TIME,'last_update_time'=>$helper->tsNOW_TIME,'last_call_finish'=>$helper->NOW_TIME,'last_state_change'=>$helper->NOW_TIME,'outbound_autodial'=>'Y','manager_ingroup_set'=>'N','last_inbound_call_time'=>$helper->NOW_TIME,'last_inbound_call_finish'=>$helper->NOW_TIME,'pause_code'=>'');
                $this->InsertService->insertData($vicidial_live_agents,$requestData);
                Log::channel('agent_live_agent')->info('Agent Live Logs: ' . json_encode($requestData));
                
                //insert data in vicidial_session_data table ***************
                $this->SessionData($user,$campaign_id,$extension,$get_conf_exten->conf_exten);

                //insert data in manager table//
                $this->insertManagerData($campaign_id,$extension,$ext_context);
          //Create token
                $token = $loginUserData->createToken($user)->plainTextToken;
                return [
                    'message' => 'Login successful',
                    'status' => 'success',
                    'token' => $token,
                    'user' => $loginUserData,
                    'phonData'=>$phoneData,
                ];
           //}
        //  catch (\Exception $e) {
        //     return [
        //         'status' => 'failed',
        //         'message' => $e->getMessage(),
        //     ];
        // }
    }

    // phone login function
    public function phoneLogin($phonelogin,$phonepass)
    {
        $tablename = 'phones';
        $loginData = array('login'=>$phonelogin,'pass'=>$phonepass);
        $loginPhoneData = $this->SelectService->getPhoneLoginWhere($tablename,['*'],$loginData);

       return  $loginPhoneData;
    }

    //check the conferences data AND Update in the table..
   public function getConferencesDatas($extension,$user)
   {

    $vicidial_conferences = 'vicidial_conferences';
    $column = 'conf_exten';
    $dcolumn = 'extension';
    $getConferencesData = $this->SelectService->getDataWhereNull($vicidial_conferences,$column,$dcolumn);
    if(!empty($getConferencesData->conf_exten))
    {
        $vicidial_conferences = 'vicidial_conferences';
        $updateExtension = array('extension'=>$extension);
        $conf_exten = 'conf_exten';
        $this->UpdateService->updateData($vicidial_conferences,$conf_exten,$getConferencesData->conf_exten,$updateExtension);

        //********* update conf_exten in vicidial_session_data** */

        return $getConferencesData;
    }else{
        return [
            'message' => 'conf_exten Failed',
            'status' => 'failed',
        ];
    }
   }
    //Insert the data in vicidial_session_data table
    public function SessionData($user,$campaign_id,$extension,$get_conf_exten)
    {
        $helper = new globalData();
        $vicidial_session_data = 'vicidial_session_data';
        $checkuser = 'user';
       $this->DeleteService->deleteData($vicidial_session_data,$checkuser,$user);//delete sesssion
        $sessionData = array('session_name'=>null,'user'=>$user,'campaign_id'=>$campaign_id,'server_ip'=>$helper->server_ip,'extension'=>$extension,'login_time'=>$helper->NOW_TIME,'webphone_url'=>'','agent_login_call'=>'','conf_exten'=>$get_conf_exten);
        return $this->InsertService->insertData($vicidial_session_data,$sessionData);
    }

    //get all  compaigns
        public function getcampaign()
        {
            $vicidial_campaigns = 'vicidial_campaigns';
            $requestData = array('campaign_id','campaign_name');
            $allcampaigns = $this->SelectService->getcampaignData($vicidial_campaigns,$requestData);
            return[
                'status'=>'success',
                'allcampaigns'=>$allcampaigns
            ];
        }



        //************** function for Agent Logout*** */
     public function logout(Request $request)
     {
        $request->validate([
                'campaign_id' => 'required',
            ]);
        $campaign_id = $request->campaign_id;

        $helper = new globalData();
        $auth = auth()->user()->user;
        $live_agents = 'vicidial_live_agents';
        $requestData = array('campaign_id','campaign_name');
        $data = $this->SelectService->getData($live_agents,'*','user',$auth);
        $extension = $data->extension;
        $checkuser = 'user';
        $vicidial_live_agents = 'vicidial_live_agents';//delete data from vicidial_live_agents
        $this->DeleteService->deleteData($vicidial_live_agents,$checkuser,$auth);
       // dd($data->extension);
        $vicidial_session_data = 'vicidial_session_data';//delete data from vicidial_session_data
        $this->DeleteService->deleteData($vicidial_session_data,$checkuser,$auth);
        $vicidial_conferences = 'vicidial_conferences';//update extension
        $requestData = array('extension'=>null);
        $this->UpdateService->updateData($vicidial_conferences,'extension',$extension,$requestData);

        $vicidial_agent_logs = 'vicidial_agent_log'; //get data
        $agentdata = $this->SelectService->getData($vicidial_agent_logs,'pause_epoch','user',$auth);
        $pause_epoch = $helper->StarTtimE -  $agentdata->pause_epoch;
        $requestData = array('pause_sec'=>$pause_epoch);
         $this->UpdateService->updateLastData($vicidial_agent_logs,'user',$auth,$requestData);//update data

         $request_array= array('user'=>$auth,'campaign_id'=>$campaign_id,'server_ip'=>$helper->server_ip,'event_time'=>$helper->NOW_TIME,'pause_type'=>'AGENT','pause_epoch'=>$helper->StarTtimE);
         $this->InsertService->insertData($vicidial_agent_logs,$request_array);

          auth()->user()->tokens()->delete();

        return response([
            'status'=>'success',
            'message' => 'User Logout Success'
        ], 200);


     }

     public function insertManagerData($campaign_id,$extension,$ext_context)
     {
        $TEMP_SIP_user_DiaL = $extension;
        $helper = new globalData();
        $vicidial_conferences = 'vicidial_conferences';

        $data = $this->SelectService->getData($vicidial_conferences,'conf_exten','extension',$extension);
        $session_id = $data->conf_exten;
        $SIqueryCID = 'S' . $helper->CIDdate . $session_id;

        $vicidial_manager = 'vicidial_manager';
        $requestData = array('uniqueid'=>'','entry_date'=>$helper->NOW_TIME,'status'=>'NEW','response'=>'N','server_ip'=>$helper->server_ip,'action'=>'Originate','callerid'=>$SIqueryCID,'cmd_line_b'=>'Channel:'.$TEMP_SIP_user_DiaL,'cmd_line_c'=>'Context:'.$ext_context,'cmd_line_d'=>'Exten:'.$session_id,'cmd_line_e'=>'Priority: 1','cmd_line_f' => 'Callerid: "' . $SIqueryCID . '"','cmd_line_g'=>'');
        $this->InsertService->insertData($vicidial_manager,$requestData);

     }

     
}
