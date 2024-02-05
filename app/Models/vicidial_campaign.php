<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vicidial_campaign extends Model
{
    use HasFactory;
    //*********************** get campaign List dropdown ********************** */
    public static function campaignList()
    {
        return vicidial_campaign::where('active', 'Y')->orderBy('campaign_id')->select('campaign_id', 'campaign_name')->get();
    }


}
