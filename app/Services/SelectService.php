<?php
// app/Services/LoginService.php

namespace App\Services;

use App\Models\UserLog;
use Illuminate\Support\Facades\Auth;
use App\Models\vicidialUser;
use App\Models\vicidial_campaign;
use Illuminate\Support\Facades\Hash;
use App\Models\SystemSetting;
use Illuminate\Support\Facades\DB;
class SelectService
{
    public function getData($tablename,$column,$scloumn,$dcloumn)
    {
        return  DB::table($tablename)->select($column)->where($scloumn,$dcloumn)->latest()->first();
    }
    //login service
    public function getData2Where($tablename,$column,$scloumn)
    {
        return  VicidialUser::select($column)->where($scloumn)->latest()->first();
    }

    public function getPhoneLoginWhere($tablename,$column,$scloumn)
    {
        return  DB::table($tablename)->select($column)->where($scloumn)->latest()->first();
    }

    //**************** get Conferences Data ******** */
    public function getDataWhereNull($tablename,$column,$dcolumn)
    {
        return  DB::table($tablename)->select($column)->whereNull($dcolumn)->first();

    }
    // for get all Campaigns
    public function getcampaignData($tablename,$column){
        return DB::table($tablename)->select($column)->get();
    }

    // public function singledata($table,$column,$scloumn,$dcloumn)
    // {
    //     $leads = DB::table($table)->select($column)->where($scloumn,$dcloumn)->latest()->get();
    //     if (!$leads) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'leads not found'
    //         ], 404);
    //     }
    //         else {

    //             return $leads;

    //         }
    // }

}
