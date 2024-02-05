<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVicidialUserGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vicidial_user_groups', function (Blueprint $table) {
            $table->id();
            $table->string('user_group', 20);
            $table->string('group_name', 40);
            $table->text('allowed_campaigns')->nullable();
            $table->text('qc_allowed_campaigns')->nullable();
            $table->text('qc_allowed_inbound_groups')->nullable();
            $table->text('group_shifts')->nullable();
            $table->enum('forced_timeclock_login', ['Y', 'N', 'ADMIN_EXEMPT'])->nullable();
            $table->enum('shift_enforcement', ['OFF', 'START', 'ALL', 'ADMIN_EXEMPT'])->default('OFF');
            $table->text('agent_status_viewable_groups')->nullable();
            $table->enum('agent_status_view_time', ['Y', 'N'])->default('N');
            $table->enum('agent_call_log_view', ['Y', 'N'])->default('N');
            $table->enum('agent_xfer_consultative', ['Y', 'N'])->default('Y');
            $table->enum('agent_xfer_dial_override', ['Y', 'N'])->default('Y');
            $table->enum('agent_xfer_vm_transfer', ['Y', 'N'])->default('Y');
            $table->enum('agent_xfer_blind_transfer', ['Y', 'N'])->default('Y');
            $table->enum('agent_xfer_dial_with_customer', ['Y', 'N'])->default('Y');
            $table->enum('agent_xfer_park_customer_dial', ['Y', 'N'])->default('Y');
            $table->enum('agent_fullscreen', ['Y', 'N'])->default('N');
            $table->string('allowed_reports', 2000)->nullable()->default('ALL REPORTS');
            $table->string('webphone_url_override', 255)->nullable();
            $table->string('webphone_systemkey_override', 100)->nullable();
            $table->enum('webphone_dialpad_override', ['DISABLED', 'Y', 'N', 'TOGGLE', 'TOGGLE_OFF'])->default('DISABLED');
            $table->text('admin_viewable_groups')->nullable();
            $table->text('admin_viewable_call_times')->nullable();
            $table->string('allowed_custom_reports', 2000)->nullable();
            $table->text('agent_allowed_chat_groups')->nullable();
            $table->enum('agent_xfer_park_3way', ['Y', 'N'])->default('Y');
            $table->string('admin_ip_list', 30)->nullable();
            $table->string('agent_ip_list', 30)->nullable();
            $table->string('api_ip_list', 30)->nullable();
            $table->string('webphone_layout', 255)->nullable();
            $table->text('allowed_queue_groups')->nullable();
            $table->enum('reports_header_override', ['DISABLED', 'LOGO_ONLY_SMALL', 'LOGO_ONLY_LARGE'])->default('DISABLED');
            $table->string('admin_home_url', 255)->nullable();
            $table->string('script_id', 20)->nullable();
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
        Schema::dropIfExists('vicidial_user_groups');
    }
}
