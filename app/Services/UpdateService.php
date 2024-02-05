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
use Illuminate\Support\Facades\DB;

class UpdateService
{
    public function updateData($tablename,$scolumn,$dcolumn,$requestdata)
    {

        return DB::table($tablename)->where($scolumn, $dcolumn)->update($requestdata);

    }
     public function updateLastData($tablename,$scolumn,$dcolumn,$requestdata)
    {

        return DB::table($tablename)->where($scolumn, $dcolumn)->groupBy('event_time')->limit(1)->update($requestdata);

    }
}
