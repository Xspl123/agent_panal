<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVicidialCampaignAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vicidial_campaign_agents', function (Blueprint $table) {
            $table->id();
            $table->string('user', 20)->nullable();
            $table->string('campaign_id', 20)->nullable();
            $table->tinyInteger('campaign_rank')->default(0);
            $table->tinyInteger('campaign_weight')->default(0);
            $table->smallInteger('calls_today')->unsigned()->default(0);
            $table->string('group_web_vars', 255)->nullable();
            $table->tinyInteger('campaign_grade')->unsigned()->default(1);
            $table->smallInteger('hopper_calls_today')->unsigned()->default(0);
            $table->smallInteger('hopper_calls_hour')->unsigned()->default(0);
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
        Schema::dropIfExists('vicidial_campaign_agents');
    }
}
