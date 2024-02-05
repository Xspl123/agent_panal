<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVicidialDidAgentLogsTable extends Migration
{

    public function up()
    {
        Schema::create('vicidial_did_agent_logs', function (Blueprint $table) {
            $table->id();
            $table->string('uniqueid', 20);
            $table->string('server_ip', 15);
            $table->string('caller_id_number', 18)->nullable();
            $table->string('caller_id_name', 20)->nullable();
            $table->string('extension', 100)->nullable();
            $table->datetime('call_date')->nullable();
            $table->string('did_id', 9)->nullable();
            $table->string('did_description', 50)->nullable();
            $table->string('did_route', 20)->nullable();
            $table->string('group_id', 20)->nullable();
            $table->string('user', 20)->default('VDCL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vicidial_did_agent_logs');
    }
}
