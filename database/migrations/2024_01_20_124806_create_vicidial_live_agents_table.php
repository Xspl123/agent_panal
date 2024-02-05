<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVicidialLiveAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vicidial_live_agents', function (Blueprint $table) {
            $table->id('live_agent_id');
            $table->string('user', 20);
            $table->string('server_ip', 15);
            $table->string('conf_exten', 20)->nullable();
            $table->string('extension', 100)->nullable();
            $table->enum('status', ['READY', 'QUEUE', 'INCALL', 'PAUSED', 'CLOSER'])->default('PAUSED');
            $table->unsignedBigInteger('lead_id');
            $table->index('lead_id');
            $table->string('campaign_id', 8)->nullable();
            $table->string('uniqueid', 20)->nullable();
            $table->string('callerid', 20)->nullable();
            $table->string('channel', 100)->nullable();
            $table->unsignedInteger('random_id')->nullable();
            $table->dateTime('last_call_time')->nullable()->index();
            $table->timestamp('last_update_time')->nullable();
            $table->dateTime('last_call_finish')->nullable()->index();
            $table->text('closer_campaigns')->nullable();
            $table->string('call_server_ip', 15)->nullable();
            $table->unsignedTinyInteger('user_level')->default(0);
            $table->string('comments', 20)->nullable();
            $table->unsignedTinyInteger('campaign_weight')->default(0);
            $table->unsignedSmallInteger('calls_today')->default(0);
            $table->string('external_hangup', 1)->nullable();
            $table->string('external_status', 255)->nullable();
            $table->string('external_pause', 20)->nullable();
            $table->string('external_dial', 100)->nullable();
            $table->text('external_ingroups')->nullable();
            $table->enum('external_blended', ['0', '1'])->default('0');
            $table->string('external_igb_set_user', 20)->nullable();
            $table->enum('external_update_fields', ['0', '1'])->default('0');
            $table->string('external_update_fields_data', 255)->nullable();
            $table->string('external_timer_action', 20)->nullable();
            $table->string('external_timer_action_message', 255)->nullable();
            $table->mediumInteger('external_timer_action_seconds')->default(-1);
            $table->unsignedBigInteger('agent_log_id')->default(0);
            $table->dateTime('last_state_change')->nullable();
            $table->text('agent_territories')->nullable();
            $table->enum('outbound_autodial', ['Y', 'N'])->default('N');
            $table->enum('manager_ingroup_set', ['Y', 'N', 'SET'])->default('N');
            $table->string('ra_user', 20)->nullable();
            $table->string('ra_extension', 20)->nullable();
            $table->string('external_dtmf', 100)->nullable();
            $table->string('external_transferconf', 120)->nullable();
            $table->string('external_park', 40)->nullable();
            $table->string('external_timer_action_destination', 100)->nullable();
            $table->enum('on_hook_agent', ['Y', 'N'])->default('N');
            $table->smallInteger('on_hook_ring_time')->default(15);
            $table->string('ring_callerid', 20)->nullable();
            $table->dateTime('last_inbound_call_time')->nullable();
            $table->dateTime('last_inbound_call_finish')->nullable();
            $table->unsignedTinyInteger('campaign_grade')->default(1);
            $table->string('external_recording', 20)->nullable();
            $table->string('external_pause_code', 6)->nullable();
            $table->string('pause_code', 6)->nullable();
            $table->unsignedBigInteger('preview_lead_id')->default(0);
            $table->unsignedBigInteger('external_lead_id')->default(0);
            $table->string('check_altphone_dial', 5)->nullable();
            $table->string('manual_dialbtn_check', 3)->nullable();
            $table->string('pause_comment', 200)->nullable();
            $table->dateTime('last_inbound_call_time_filtered')->nullable();
            $table->dateTime('last_inbound_call_finish_filtered')->nullable();
            $table->unsignedBigInteger('dial_campaign_id')->nullable();
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
        Schema::dropIfExists('vicidial_live_agents');
    }
}
