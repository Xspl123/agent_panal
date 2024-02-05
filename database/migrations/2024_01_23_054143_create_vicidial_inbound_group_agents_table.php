<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVicidialInboundGroupAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vicidial_inbound_group_agents', function (Blueprint $table) {
            $table->id();
            $table->string('user', 20)->nullable();
            $table->string('group_id', 20)->nullable();
            $table->tinyInteger('group_rank')->default(0);
            $table->tinyInteger('group_weight')->default(0);
            $table->smallInteger('calls_today')->unsigned()->default(0);
            $table->string('group_web_vars', 255)->nullable();
            $table->tinyInteger('group_grade')->unsigned()->default(1);
            $table->string('group_type', 1)->default('C');
            $table->smallInteger('calls_today_filtered')->unsigned()->default(0);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('vicidial_inbound_group_agents');
    }
}
