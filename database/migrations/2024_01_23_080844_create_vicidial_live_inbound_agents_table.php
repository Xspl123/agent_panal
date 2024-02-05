<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVicidialLiveInboundAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vicidial_live_inbound_agents', function (Blueprint $table) {
            $table->id();
            $table->string('user', 20)->nullable();
            $table->string('group_id', 20)->nullable();
            $table->tinyInteger('group_weight')->default(0);
            $table->unsignedSmallInteger('calls_today')->default(0);
            $table->datetime('last_call_time')->nullable();
            $table->datetime('last_call_finish')->nullable();
            $table->unsignedTinyInteger('group_grade')->default(1);
            $table->unsignedSmallInteger('calls_today_filtered')->default(0);
            $table->datetime('last_call_time_filtered')->nullable();
            $table->datetime('last_call_finish_filtered')->nullable();
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
        Schema::dropIfExists('vicidial_live_inbound_agents');
    }
}
