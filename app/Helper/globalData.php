<?php

namespace App\Helpers;

use App\Models\VicidialWebserver;
use App\Models\VicidialUrl;
use App\Models\VicidialUser;

class globalData
{
    public $forever_stop = 0;
    public $isdst;
    public $StarTtimE;
    public $NOW_TIME;
    public $tsNOW_TIME;
    public $FILE_TIME;
    public $loginDATE;
    public $CIDdate;
    public $month_old;
    public $past_month_date;
    public $minutes_old;
    public $past_minutes_date;
    public $JS_date;
    public $random;

    public $hide_gender = 0;
    public $date;
    public $ip;
    public $browser;
    public $script_name;
    public $server_name;
    public $server_port;
    public $agcPAGE;
    public $agcDIR;
    public $server_ip;
    public $SIPSAK_prefix;

    public function __construct()
    {
        $this->initialize();
    }

    private function initialize()
    {
        $this->isdst = date("I");
        $this->StarTtimE = date("U");
        $this->NOW_TIME = date("Y-m-d H:i:s");
        $this->tsNOW_TIME = date("YmdHis");
        $this->FILE_TIME = date("Ymd-His");
        $this->loginDATE = date("Ymd");
        $this->CIDdate = date("ymdHis");
        $this->month_old = mktime(11, 0, 0, date("m"), date("d")-2,  date("Y"));
        $this->past_month_date = date("Y-m-d H:i:s", $this->month_old);
        $this->minutes_old = mktime(date("H"), date("i")-2, date("s"), date("m"), date("d"),  date("Y"));
        $this->past_minutes_date = date("Y-m-d H:i:s", $this->minutes_old);
        $this->JS_date = $this->StarTtimE . "000";
        $this->random = (rand(1000000, 9999999) + 10000000);
        $this->date = date("r");
        $this->server_ip = $_SERVER['SERVER_ADDR'];
        $this->SIPSAK_prefix = 'LIN-';

    }


}
