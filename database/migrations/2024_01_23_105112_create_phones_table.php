<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonesTable extends Migration
{

    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string('extension')->nullable();
            $table->string('dialplan_number', 20)->nullable();
            $table->string('voicemail_id', 10)->nullable();
            $table->string('phone_ip', 15)->nullable();
            $table->string('computer_ip', 15)->nullable();
            $table->string('server_ip')->nullable();
            $table->string('login', 15)->nullable();
            $table->string('pass', 10)->nullable();
            $table->string('status', 10)->nullable();
            $table->enum('active', ['Y', 'N']);
            $table->string('phone_type', 50)->nullable();
            $table->string('fullname', 50)->nullable();
            $table->string('company', 10)->nullable();
            $table->string('picture', 19)->nullable();
            $table->integer('messages')->nullable();
            $table->integer('old_messages')->nullable();
            $table->enum('protocol', ['SIP', 'PJSIP', 'Zap', 'IAX2', 'EXTERNAL']);
            $table->string('local_gmt', 6)->nullable();
            $table->string('ASTmgrUSERNAME', 20)->nullable();
            $table->string('ASTmgrSECRET', 20)->nullable();
            $table->string('login_user', 20)->nullable();
            $table->string('login_pass', 20)->nullable();
            $table->string('login_campaign', 10)->nullable();
            $table->string('park_on_extension', 10)->nullable();
            $table->string('conf_on_extension', 10)->nullable();
            $table->string('VICIDIAL_park_on_extension', 10)->nullable();
            $table->string('VICIDIAL_park_on_filename', 10)->nullable();
            $table->string('monitor_prefix', 10)->nullable();
            $table->string('recording_exten', 10)->nullable();
            $table->string('voicemail_exten', 10)->nullable();
            $table->string('voicemail_dump_exten', 20)->nullable();
            $table->string('ext_context', 20)->nullable();
            $table->string('dtmf_send_extension', 100)->nullable();
            $table->string('call_out_number_group', 100)->nullable();
            $table->string('client_browser', 100)->nullable();
            $table->string('install_directory', 100)->nullable();
            $table->string('local_web_callerID_URL', 255)->nullable();
            $table->string('VICIDIAL_web_URL', 255)->nullable();
            $table->enum('AGI_call_logging_enabled', ['0', '1'])->nullable();
            $table->enum('user_switching_enabled', ['0', '1'])->nullable();
            $table->enum('conferencing_enabled', ['0', '1'])->nullable();
            $table->enum('admin_hangup_enabled', ['0', '1'])->nullable();
            $table->enum('admin_hijack_enabled', ['0', '1'])->nullable();
            $table->enum('admin_monitor_enabled', ['0', '1'])->nullable();
            $table->enum('call_parking_enabled', ['0', '1'])->nullable();
            $table->enum('updater_check_enabled', ['0', '1'])->nullable();
            $table->enum('AFLogging_enabled', ['0', '1'])->nullable();
            $table->enum('QUEUE_ACTION_enabled', ['0', '1'])->nullable();
            $table->enum('CallerID_popup_enabled', ['0', '1'])->nullable();
            $table->enum('voicemail_button_enabled', ['0', '1'])->nullable();
            $table->enum('enable_fast_refresh', ['0', '1']);
            $table->integer('fast_refresh_rate')->nullable()->default(1000);
            $table->enum('enable_persistant_mysql', ['0', '1']);
            $table->enum('auto_dial_next_number', ['0', '1']);
            $table->enum('VDstop_rec_after_each_call', ['0', '1']);
            $table->string('DBX_server', 15)->nullable();
            $table->string('DBX_database', 15)->default('asterisk');
            $table->string('DBX_user', 15)->default('cron');
            $table->string('DBX_pass', 15)->default('vs@123');
            $table->integer('DBX_port')->default(3306);
            $table->string('DBY_server', 15)->nullable();
            $table->string('DBY_database', 15)->default('asterisk');
            $table->string('DBY_user', 15)->default('cron');
            $table->string('DBY_pass', 15)->default('vs@123');
            $table->integer('DBY_port')->default(3306);
            $table->string('outbound_cid', 20)->nullable();
            $table->enum('enable_sipsak_messages', ['0', '1'])->default('0');
            $table->string('email', 100)->nullable();
            $table->string('template_id', 15)->nullable();
            $table->text('conf_override')->nullable();
            $table->string('phone_context', 20)->default('default');
            $table->smallInteger('phone_ring_timeout')->default(60);
            $table->string('conf_secret', 20)->default('test');
            $table->enum('delete_vm_after_email', ['N', 'Y'])->default('N');
            $table->enum('is_webphone', ['Y', 'N', 'Y_API_LAUNCH'])->default('N');
            $table->enum('use_external_server_ip', ['Y', 'N'])->default('N');
            $table->string('codecs_list', 100)->nullable();
            $table->enum('codecs_with_template', ['0', '1'])->default('0');
            $table->enum('webphone_dialpad', ['Y', 'N', 'TOGGLE', 'TOGGLE_OFF'])->default('Y');
            $table->enum('on_hook_agent', ['Y', 'N'])->default('N');
            $table->enum('webphone_auto_answer', ['Y', 'N'])->default('Y');
            $table->string('voicemail_timezone', 30)->default('eastern');
            $table->string('voicemail_options', 255)->nullable();
            $table->string('user_group', 20)->default('---ALL---');
            $table->string('voicemail_greeting', 100)->nullable();
            $table->string('voicemail_dump_exten_no_inst', 20)->default('85026666666667');
            $table->enum('voicemail_instructions', ['Y', 'N'])->default('Y');
            $table->enum('on_login_report', ['Y', 'N'])->default('N');
            $table->string('unavail_dialplan_fwd_exten', 40)->nullable();
            $table->string('unavail_dialplan_fwd_context', 100)->nullable();
            $table->text('nva_call_url')->nullable();
            $table->string('nva_search_method', 40)->default('NONE');
            $table->string('nva_error_filename', 255)->nullable();
            $table->bigInteger('nva_new_list_id')->unsigned()->default(995);
            $table->string('nva_new_phone_code', 10)->default('1');
            $table->string('nva_new_status', 6)->default('NVAINS');
            $table->enum('webphone_dialbox', ['Y', 'N'])->default('Y');
            $table->enum('webphone_mute', ['Y', 'N'])->default('Y');
            $table->enum('webphone_volume', ['Y', 'N'])->default('Y');
            $table->enum('webphone_debug', ['Y', 'N'])->default('N');
            $table->string('outbound_alt_cid', 20)->nullable();
            $table->enum('conf_qualify', ['Y', 'N'])->default('Y');
            $table->string('alias', 100)->nullable();
            $table->string('webphone_layout', 255)->nullable();
            $table->string('mohsuggest', 100)->nullable();
            $table->enum('peer_status', ['UNKNOWN', 'REGISTERED', 'UNREGISTERED', 'REALTIME', 'LAGGED', 'LAGGED_REGISTERED'])
                ->default('UNKNOWN');
            $table->smallInteger('ping_time')->nullable();
            $table->string('webphone_settings', 40)->default('VICIPHONE_SETTINGS');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('phones');
    }
}
