<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVicidialBenchAgentLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vicidial_bench_agent_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('lead_id');
            $table->datetime('bench_date')->nullable();
            $table->string('absent_agent', 20)->nullable();
            $table->string('bench_agent', 20)->nullable();
            $table->string('user', 20)->nullable();
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
        Schema::dropIfExists('vicidial_bench_agent_logs');
    }
}
