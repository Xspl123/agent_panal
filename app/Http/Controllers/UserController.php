<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\SelectService;
use App\Services\InsertService;
use App\Services\UpdateService;
use App\Helpers\InsertWebServerUrl;
use Illuminate\Support\Facades\Auth;
use App\Models\VicidialUser;
use App\Models\SystemSetting;
use App\Models\VicidialUserGroup;
use App\Models\vicidial_campaign;
use App\Http\Requests\StoreDatas;
use App\Helpers\globalData;
use Illuminate\Support\Facades\Schema;


class UserController extends Controller
{
    protected $SelectService;
    protected $InsertService;
    protected $UpdateService;



    public function __construct(SelectService $SelectService, InsertService $InsertService,UpdateService $UpdateService)
    {
        $this->SelectService = $SelectService;
        $this->InsertService = $InsertService;
        $this->UpdateService = $UpdateService;

    }

    //login
    public function UserLogin(Request $request)
    {
        // $helper = new globalData();
        // $tablename = 'vicidial_users';
        // $user = $request->user;
        // $password = $request->pass;
        // $campaign_id = $request->campaign_id;
        // $result = $this->SelectService->getData($tablename,['*'],'user',$user);
        // if (!$result) {
        //     return [
        //         'message' => 'The provided credentials are incorrect.',
        //         'status' => 'failed',
        //     ];
        // }
        // if ($result->active === 'N') {
        //     return [
        //         'message' => 'User is deactivated. Please contact the Administrator.',
        //         'status' => 'failed',
        //     ];
        // }
        // $user_group = $result->user_group;
        // $user_level = $result->user_level;
        //  //insert data in agent_logs_table
        // $vicidial_agent_log = 'vicidial_agent_logs';
        // $request_array=array('user'=>$user,'campaign_id'=>$campaign_id,'server_ip'=>$helper->server_ip,'event_time'=>$helper->NOW_TIME,'user_group'=>$user_group,'pause_epoch'=>$helper->StarTtimE,'pause_sec'=>'0','wait_epoch'=>$helper->StarTtimE,'pause_type'=>'AGENT','sub_status'=>'LOGIN');
        // $this->InsertService->insertData($vicidial_agent_log,$request_array);

        // //insert Data in vicidial_live_agents table ***
        // $vicidial_live_agents = 'vicidial_live_agents';
        // $requestData = array('user'=>$user, 'server_ip'=>$helper->server_ip,'status'=>'PAUSED','lead_id'=>'0','campaign_id'=>$campaign_id,'random_id'=>$helper->random,'user_level'=>$user_level,'last_call_time'=>$helper->NOW_TIME,'last_update_time'=>$helper->tsNOW_TIME,'last_call_finish'=>$helper->NOW_TIME,'last_state_change'=>$helper->NOW_TIME,'outbound_autodial'=>'Y','manager_ingroup_set'=>'N','last_inbound_call_time'=>$helper->NOW_TIME,'last_inbound_call_finish'=>$helper->NOW_TIME,'pause_code'=>'LOGIN');
        // $this->InsertService->insertData($vicidial_live_agents,$requestData);
        // $token = $user->createToken($user)->plainTextToken;
        // return [
        //     'message' => 'Login successful',
        //     'status' => 'success',
        //     'token' => $token,
        //     'user' => $result,
        // ];


    }


    public function InsertData(StoreDatas $request)
    {
        $tablename = 'vicidial_live_agents';
        $data = $request->validated();
        $result = $this->InsertService->insertData($tablename,$data);

        print_r($result);
    }

    public function UpdateData(StoreDatas $request)
    {
        $tablename = 'vicidial_live_agents';
        $data = $request->validated();
        $result = $this->UpdateService->updateData($tablename,'live_agent_id','1',$data);
        print_r($result);
    }

    public function demo()
    {
        $helper = new globalData();
            echo "Forever Stop: " . $helper->minutes_old . "<br>";

    }

}
