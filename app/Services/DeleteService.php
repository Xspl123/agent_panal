<?php
// app/Services/LoginService.php

namespace App\Services;
use Illuminate\Support\Facades\DB;

class DeleteService
{
    public function deleteData($tablename,$column,$dcolumn)
    {
        return DB::table($tablename)->where($column, $dcolumn)->delete();

    }


}
