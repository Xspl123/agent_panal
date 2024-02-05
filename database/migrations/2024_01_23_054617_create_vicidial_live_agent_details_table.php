<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVicidialLiveAgentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vicidial_live_agent_details', function (Blueprint $table) {
            $table->id();
            $table->string('user', 20);
            $table->datetime('update_date')->nullable();
            $table->string('web_ip', 45)->nullable();
            $table->mediumInteger('latency')->default(0);
            $table->mediumInteger('latency_min_avg')->default(0);
            $table->mediumInteger('latency_min_peak')->default(0);
            $table->mediumInteger('latency_hour_avg')->default(0);
            $table->mediumInteger('latency_hour_peak')->default(0);
            $table->mediumInteger('latency_today_avg')->default(0);
            $table->mediumInteger('latency_today_peak')->default(0);
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
        Schema::dropIfExists('vicidial_live_agent_details');
    }
}
