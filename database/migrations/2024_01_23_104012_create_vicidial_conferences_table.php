<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVicidialConferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vicidial_conferences', function (Blueprint $table) {
            $table->id();
            $table->string('conf_exten');
            $table->string('server_ip', 15);
            $table->string('extension', 100)->nullable();
            $table->enum('leave_3way', ['0', '1'])->default('0');
            $table->datetime('leave_3way_datetime')->nullable();
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
        Schema::dropIfExists('vicidial_conferences');
    }
}
