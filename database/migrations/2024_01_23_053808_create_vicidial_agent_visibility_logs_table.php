<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVicidialAgentVisibilityLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vicidial_agent_visibility_logs', function (Blueprint $table) {
            $table->id();
            $table->datetime('db_time');
            $table->unsignedInteger('event_start_epoch');
            $table->unsignedInteger('event_end_epoch');
            $table->string('user', 20)->charset('latin1')->nullable();
            $table->unsignedInteger('length_in_sec');
            $table->enum('visibility', ['VISIBLE', 'HIDDEN', 'LOGIN', 'NONE'])->default('NONE');
            $table->unsignedInteger('agent_log_id')->nullable();
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
        Schema::dropIfExists('vicidial_agent_visibility_logs');
    }
}
