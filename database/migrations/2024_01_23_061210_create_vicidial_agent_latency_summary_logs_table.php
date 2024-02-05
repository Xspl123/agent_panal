<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVicidialAgentLatencySummaryLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vicidial_agent_latency_summary_logs', function (Blueprint $table) {
            $table->id();
            $table->string('user', 20);
            $table->datetime('log_date')->nullable();
            $table->string('web_ip', 45)->nullable();
            $table->mediumInteger('latency_avg')->default(0);
            $table->mediumInteger('latency_peak')->default(0);
            $table->smallInteger('latency_count')->default(0);
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
        Schema::dropIfExists('vicidial_agent_latency_summary_logs');
    }
}
