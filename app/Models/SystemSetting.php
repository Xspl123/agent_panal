<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SystemSetting extends Model
{
    use HasFactory;


    public static function getSystemSettingData()
    {
        $checkSystemSetting =  SystemSetting::first();
        if ($checkSystemSetting->use_non_latin < 1) {
            Auth::logout();
            return [
                'message' => 'User logged out due to non-Latin character condition.',
                'status' => 'failed',
            ];
        }
        return $checkSystemSetting;

    }
}
