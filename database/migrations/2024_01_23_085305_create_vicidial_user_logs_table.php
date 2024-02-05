<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVicidialUserLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vicidial_user_logs', function (Blueprint $table) {
            $table->id('user_log_id');
            $table->string('user', 20)->nullable();
            $table->string('event', 50)->nullable();
            $table->string('campaign_id', 8)->nullable();
            $table->datetime('event_date')->nullable();
            $table->unsignedInteger('event_epoch')->nullable();
            $table->string('user_group', 20)->nullable();
            $table->string('session_id', 20)->nullable();
            $table->string('server_ip', 15)->nullable();
            $table->string('extension', 50)->nullable();
            $table->string('computer_ip', 15)->nullable();
            $table->string('browser', 255)->nullable();
            $table->string('data', 255)->nullable();
            $table->string('phone_login', 15)->nullable();
            $table->string('server_phone', 15)->nullable();
            $table->string('phone_ip')->nullable();
            $table->unsignedSmallInteger('webserver')->default(0);
            $table->unsignedInteger('login_url')->default(0);
            $table->unsignedSmallInteger('browser_width')->default(0);
            $table->unsignedSmallInteger('browser_height')->default(0);
            $table->string('event_add', 250)->nullable();
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
        Schema::dropIfExists('vicidial_user_logs');
    }
}
