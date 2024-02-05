<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVicidialRemoteAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vicidial_remote_agents', function (Blueprint $table) {
            $table->id('remote_agent_id');
            $table->string('user_start', 20)->charset('utf8')->nullable();
            $table->tinyInteger('number_of_lines')->unsigned()->default(1);
            $table->string('server_ip', 15)->charset('utf8')->nullable();
            $table->string('conf_exten', 20)->charset('utf8')->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('INACTIVE');
            $table->string('campaign_id', 8)->nullable();
            $table->text('closer_campaigns')->nullable();
            $table->string('extension_group', 20)->default('NONE');
            $table->string('extension_group_order', 20)->default('NONE');
            $table->enum('on_hook_agent', ['Y', 'N'])->default('N');
            $table->smallInteger('on_hook_ring_time')->unsigned()->default(15);
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
        Schema::dropIfExists('vicidial_remote_agents');
    }
}
