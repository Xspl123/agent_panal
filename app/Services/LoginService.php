<?php
// app/Services/LoginService.php

namespace App\Services;

use App\Models\UserLog;
use Illuminate\Support\Facades\Auth;
use App\Models\vicidialUser;
use App\Models\vicidial_campaign;
use Illuminate\Support\Facades\Hash;
use App\Helpers\InsertWebServerUrl;
use App\Models\SystemSetting;
class LoginService
{
    // *********************** function for Login *****************
    public function login($username, $password)
    {
        $user = vicidialUser::where('user', $username)->where('pass',$password)->first();

        if (!$user) {
            return [
                'message' => 'The provided credentials are incorrect.',
                'status' => 'failed',
            ];
        }
        if ($user->active === 'N') {
            return [
                'message' => 'User is deactivated. Please contact the Administrator.',
                'status' => 'failed',
            ];
        }
            InsertWebServerUrl::insertWebserverAndUrl();//insert or update urls and webservers
         SystemSetting::getSystemSettingData();//check systemSetting

        $token = $user->createToken($username)->plainTextToken;
        return [
            'message' => 'Login successful',
            'status' => 'success',
            'token' => $token,
            'user' => $user,
        ];



    }



    // *********************** campaignList **********


}


?>
