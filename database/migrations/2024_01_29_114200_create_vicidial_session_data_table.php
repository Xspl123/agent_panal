<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVicidialSessionDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vicidial_session_data', function (Blueprint $table) {
            $table->id();
            $table->string('session_name')->nullable();
            $table->string('user')->nullable();
            $table->string('campaign_id')->nullable();
            $table->string('server_ip');
            $table->string('conf_exten')->nullable();
            $table->string('extension');
            $table->dateTime('login_time');
            $table->text('webphone_url')->nullable();
            $table->text('agent_login_call')->nullable();
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
        Schema::dropIfExists('vicidial_session_data');
    }
}
