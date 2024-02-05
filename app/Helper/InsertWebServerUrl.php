<?php
// app/Helpers/VicidialHelper.php

namespace App\Helpers;
use App\Models\VicidialWebserver;
use App\Models\VicidialUrl;
use App\Models\VicidialUser;
class InsertWebServerUrl
{
    public static function insertWebserverAndUrl()
    {
        $agcPAGE = request()->fullUrl();
        $agcDIR = preg_replace('/vicidial\.php/i', '', $agcPAGE);

        $VULhostname = php_uname('n');
        $VULservername = $_SERVER['SERVER_NAME'];
        if (strlen($VULhostname) < 1) {
            $VULhostname = 'X';
        }
        if (strlen($VULservername) < 1) {
            $VULservername = 'X';
        }

        $webserver = VicidialWebserver::where('webserver', $VULservername)
            ->where('hostname', $VULhostname)
            ->first();

        if (!$webserver) {
            $webserver = new VicidialWebserver();
            $webserver->webserver = $VULservername;
            $webserver->hostname = $VULhostname;
            $webserver->save();
        }

        $webserver_id = $webserver->webserver_id;
        $url = VicidialUrl::where('url', $agcDIR)->first();

        if (!$url) {
            $url = new VicidialUrl();
            $url->url = $agcDIR;
            $url->save();
        }

        $url_id = $url->url_id;

        return [$webserver_id, $url_id];
    }

    // for


}
