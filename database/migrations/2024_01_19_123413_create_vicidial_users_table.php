<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVicidialUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vicidial_users', function (Blueprint $table) {
            $table->id('user_id');
            //$table->string('user_id', 9)->unsigned();
            $table->string('user', 20)->unique();
            $table->string('pass', 20);
            $table->string('full_name', 50)->nullable();
            $table->tinyInteger('user_level')->unsigned()->default(1);
            $table->string('user_group', 20)->nullable();
            $table->string('phone_login', 20)->nullable();
            $table->string('phone_pass', 20)->nullable();
            $table->enum('delete_users', ['0', '1'])->default('0');
            $table->enum('delete_user_groups', ['0', '1'])->default('0');
            $table->enum('delete_lists', ['0', '1'])->default('0');
            $table->enum('delete_campaigns', ['0', '1'])->default('0');
            $table->enum('delete_ingroups', ['0', '1'])->default('0');
            $table->enum('delete_remote_agents', ['0', '1'])->default('0');
            $table->enum('load_leads', ['0', '1'])->default('0');
            $table->enum('campaign_detail', ['0', '1'])->default('0');
            $table->enum('ast_admin_access', ['0', '1'])->default('0');
            $table->enum('ast_delete_phones', ['0', '1'])->default('0');
            $table->enum('delete_scripts', ['0', '1'])->default('0');
            $table->enum('modify_leads', ['0', '1', '2', '3', '4', '5', '6'])->default('0');
            $table->enum('hotkeys_active', ['0', '1'])->default('0');
            $table->enum('change_agent_campaign', ['0', '1'])->default('0');
            $table->enum('agent_choose_ingroups', ['0', '1'])->default('1');
            $table->text('closer_campaigns')->nullable();
            $table->enum('scheduled_callbacks', ['0', '1'])->default('1');
            $table->enum('agentonly_callbacks', ['0', '1'])->default('0');
            $table->enum('agentcall_manual', ['0', '1', '2', '3', '4', '5'])->default('0');
            $table->enum('vicidial_recording', ['0', '1'])->default('1');
            $table->enum('vicidial_transfers', ['0', '1'])->default('1');
            $table->enum('delete_filters', ['0', '1'])->default('0');
            $table->enum('alter_agent_interface_options', ['0', '1'])->default('0');
            $table->enum('closer_default_blended', ['0', '1'])->default('0');
            $table->enum('delete_call_times', ['0', '1'])->default('0');
            $table->enum('modify_call_times', ['0', '1'])->default('0');
            $table->enum('modify_users', ['0', '1'])->default('0');
            $table->enum('modify_campaigns', ['0', '1'])->default('0');
            $table->enum('modify_lists', ['0', '1'])->default('0');
            $table->enum('modify_scripts', ['0', '1'])->default('0');
            $table->enum('modify_filters', ['0', '1'])->default('0');
            $table->enum('modify_ingroups', ['0', '1'])->default('0');
            $table->enum('modify_usergroups', ['0', '1'])->default('0');
            $table->enum('modify_remoteagents', ['0', '1'])->default('0');
            $table->enum('modify_servers', ['0', '1'])->default('0');
            $table->enum('view_reports', ['0', '1'])->default('0');
            $table->enum('vicidial_recording_override', ['DISABLED', 'NEVER', 'ONDEMAND', 'ALLCALLS',])->default('DISABLED');
            $table->enum('alter_custdata_override', ['NOT_ACTIVE', 'ALLOW_ALTER'])->default('NOT_ACTIVE');
            $table->enum('qc_enabled', ['0', '1'])->default('0');
            $table->unsignedTinyInteger('qc_user_level')->default(1);
            $table->enum('qc_pass', ['0', '1'])->default('0');
            $table->enum('qc_finish', ['0', '1'])->default('0');
            $table->enum('qc_commit', ['0', '1'])->default('0');
            $table->enum('add_timeclock_log', ['0', '1'])->default('0');
            $table->enum('modify_timeclock_log', ['0', '1'])->default('0');
            $table->enum('delete_timeclock_log', ['0', '1'])->default('0');
            $table->enum('alter_custphone_override', ['NOT_ACTIVE', 'ALLOW_ALTER'])->default('NOT_ACTIVE');
            $table->enum('vdc_agent_api_access', ['0', '1'])->default('0');
            $table->enum('modify_inbound_dids', ['0', '1'])->default('0');
            $table->enum('delete_inbound_dids', ['0', '1'])->default('0');
            $table->enum('active', ['Y', 'N'])->default('Y');
            $table->enum('alert_enabled', ['0', '1'])->default('0');
            $table->enum('download_lists', ['0', '1'])->default('0');
            $table->enum('agent_shift_enforcement_override', ['DISABLED', 'OFF', 'START', 'ALL'])->default('DISABLED');
            $table->enum('manager_shift_enforcement_override', ['0', '1'])->default('0');
            $table->enum('shift_override_flag', ['0', '1'])->default('0');
            $table->enum('export_reports', ['0', '1'])->default('0');
            $table->enum('delete_from_dnc', ['0', '1'])->default('0');
            $table->string('email', 100)->nullable();
            $table->string('user_code', 100)->nullable();
            $table->string('territory', 100)->nullable();
            $table->enum('allow_alerts', ['0', '1'])->default('0');
            $table->enum('agent_choose_territories', ['0', '1'])->default('1');
            $table->string('custom_one', 100)->nullable();
            $table->string('custom_two', 100)->nullable();
            $table->string('custom_three', 100)->nullable();
            $table->string('custom_four', 100)->nullable();
            $table->string('custom_five', 100)->nullable();
            $table->string('voicemail_id', 10)->nullable();
            $table->enum('agent_call_log_view_override', ['DISABLED', 'Y', 'N'])->default('DISABLED');
            $table->enum('callcard_admin', ['1', '0'])->default('0');
            $table->enum('agent_choose_blended', ['0', '1'])->default('1');
            $table->enum('realtime_block_user_info', ['0', '1'])->default('0');
            $table->enum('custom_fields_modify', ['0', '1'])->default('0');
            $table->enum('force_change_password', ['Y', 'N'])->default('N');
            $table->enum('agent_lead_search_override', ['NOT_ACTIVE', 'ENABLED', 'LIVE_CALL_INBOUND'])->default('NOT_ACTIVE');
            $table->enum('modify_shifts', ['1', '0'])->default('0');
            $table->enum('modify_phones', ['1', '0'])->default('0');
            $table->enum('modify_carriers', ['1', '0'])->default('0');
            $table->enum('modify_labels', ['1', '0'])->default('0');
            $table->enum('modify_statuses', ['1', '0'])->default('0');
            $table->enum('modify_voicemail', ['1', '0'])->default('0');
            $table->enum('modify_audiostore', ['1', '0'])->default('0');
            $table->enum('modify_moh', ['1', '0'])->default('0');
            $table->enum('modify_tts', ['1', '0'])->default('0');
            $table->enum('preset_contact_search', ['NOT_ACTIVE', 'ENABLED', 'DISABLED'])->default('NOT_ACTIVE');
            $table->enum('modify_contacts', ['1', '0'])->default('0');
            $table->enum('modify_same_user_level', ['0', '1'])->default('1');
            $table->enum('admin_hide_lead_data', ['0', '1'])->default('0');
            $table->enum('admin_hide_phone_data', ['0', '1', '2_DIGITS', '3_DIGITS', '4_DIGITS'])->default('0');
            $table->enum('agentcall_email', ['0', '1'])->default('0');
            $table->enum('modify_email_accounts', ['0', '1'])->default('0');
            $table->unsignedTinyInteger('failed_login_count')->default(0);
            $table->dateTime('last_login_date')->default('2001-01-01 00:00:01');
            $table->string('last_ip', 15)->nullable();
            $table->string('pass_hash', 100)->nullable();
            $table->enum('alter_admin_interface_options', ['0', '1'])->default('1');
            $table->smallInteger('max_inbound_calls')->unsigned()->default(0);
            $table->enum('modify_custom_dialplans', ['1', '0'])->default('0');
            $table->smallInteger('wrapup_seconds_override')->default(-1);
            $table->enum('modify_languages', ['1', '0'])->default('0');
            $table->string('selected_language', 100)->default('default English');
            $table->enum('user_choose_language', ['1', '0'])->default('0');
            $table->enum('ignore_group_on_search', ['1', '0'])->default('0');
            $table->enum('api_list_restrict', ['1', '0'])->default('0');
            $table->string('api_allowed_functions', 1000)->default('ALL_FUNCTIONS');
            $table->string('lead_filter_id', 20)->default('NONE');
            $table->enum('admin_cf_show_hidden', ['1', '0'])->default('0');
            $table->enum('agentcall_chat', ['1', '0'])->default('0');
            $table->enum('user_hide_realtime', ['1', '0'])->default('0');
            $table->enum('access_recordings', ['0', '1'])->default('0');
            $table->enum('modify_colors', ['1', '0'])->default('0');
            $table->string('user_nickname', 50)->nullable();
            $table->smallInteger('user_new_lead_limit')->nullable()->default(-1);
            $table->enum('api_only_user', ['0', '1'])->default('0');
            $table->enum('modify_auto_reports', ['1', '0'])->default('0');
            $table->enum('modify_ip_lists', ['1', '0'])->default('0');
            $table->enum('ignore_ip_list', ['1', '0'])->default('0');
            $table->mediumInteger('ready_max_logout')->nullable()->default(-1);
            $table->string('pause_exceed', 2)->nullable()->default('N');
            $table->enum('rec_search_permission', ['1', '0'])->default('0');
            $table->enum('export_gdpr_leads', ['0', '1', '2'])->default('0');
            $table->enum('pause_code_approval', ['1', '0'])->default('0');
            $table->smallInteger('max_hopper_calls')->unsigned()->default(0);
            $table->smallInteger('max_hopper_calls_hour')->unsigned()->default(0);
            $table->enum('mute_recordings', ['DISABLED', 'Y', 'N'])->default('DISABLED');
            $table->enum('hide_call_log_info', ['DISABLED', 'Y', 'N', 'SHOW_1', 'SHOW_2', 'SH...'])->default('DISABLED');
            $table->enum('next_dial_my_callbacks', ['NOT_ACTIVE', 'DISABLED', 'ENABLED'])->default('NOT_ACTIVE');
            $table->text('user_admin_redirect_url')->nullable();
            $table->enum('max_inbound_filter_enabled', ['0', '1'])->default('0');
            $table->text('max_inbound_filter_statuses')->nullable();
            $table->text('max_inbound_filter_ingroups')->nullable();
            $table->smallInteger('max_inbound_filter_min_sec')->nullable()->default(-1);
            $table->string('status_group_id', 20)->nullable();
            $table->string('mobile_number', 20)->nullable();
            $table->enum('two_factor_override', ['NOT_ACTIVE', 'ENABLED', 'DISABLED'])->default('NOT_ACTIVE');
            $table->string('manual_dial_filter', 50)->nullable()->default('DISABLED');
            $table->string('user_location', 100)->nullable();
            $table->enum('download_invalid_files', ['0', '1'])->default('0');
            $table->string('user_group_two', 20)->nullable();
            $table->mediumInteger('failed_login_attempts_today')->unsigned()->default(0);
            $table->smallInteger('failed_login_count_today')->unsigned()->default(0);
            $table->string('failed_last_ip_today', 50)->nullable();
            $table->string('failed_last_type_today', 20)->nullable();
            $table->enum('modify_dial_prefix', ['0', '1', '2', '3', '4', '5', '6'])->default('0');
            $table->mediumInteger('inbound_credits')->nullable()->default(-1);

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
        Schema::dropIfExists('vicidial_users');
    }
}
