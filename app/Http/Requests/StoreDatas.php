<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDatas extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user'=> 'nullable',
            'server_ip'=> 'nullable',
            'conf_exten'=> 'nullable',
            'extension'=> 'nullable',
            'status'=> 'nullable',
            'lead_id'=> 'nullable',
            'campaign_id'=> 'nullable',
            'uniqueid'=> 'nullable',
            'callerid'=> 'nullable',
            'channel'=> 'nullable',
        ];
    }
}
