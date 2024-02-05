<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VicidialLiveAgent extends Model
{
    use HasFactory;
    protected $fillable = [
        'user',
        'server_ip',
        'conf_exten',
        'extension',
        'status',
        'lead_id',
        'campaign_id',
        'uniqueid',
        'callerid',
        'channel'
    ];

}
