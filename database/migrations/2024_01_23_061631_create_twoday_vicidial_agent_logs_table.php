<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTwodayVicidialAgentLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('twoday_vicidial_agent_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('agent_log_id');
            $table->string('user', 20)->nullable();
            $table->string('server_ip', 15)->nullable();
            $table->datetime('event_time')->nullable();
            $table->unsignedInteger('lead_id')->nullable();
            $table->string('campaign_id', 8)->nullable();
            $table->unsignedInteger('pause_epoch')->nullable();
            $table->unsignedSmallInteger('pause_sec')->default(0);
            $table->unsignedInteger('wait_epoch')->nullable();
            $table->unsignedSmallInteger('wait_sec')->default(0);
            $table->unsignedInteger('talk_epoch')->nullable();
            $table->unsignedSmallInteger('talk_sec')->default(0);
            $table->unsignedInteger('dispo_epoch')->nullable();
            $table->unsignedSmallInteger('dispo_sec')->default(0);
            $table->string('status', 6)->nullable();
            $table->string('user_group', 20)->nullable();
            $table->string('comments', 20)->nullable();
            $table->string('sub_status', 6)->nullable();
            $table->unsignedInteger('dead_epoch')->nullable();
            $table->unsignedSmallInteger('dead_sec')->default(0);
            $table->enum('processed', ['Y', 'N'])->default('N');
            $table->string('uniqueid', 20)->nullable();
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
        Schema::dropIfExists('twoday_vicidial_agent_logs');
    }
}
