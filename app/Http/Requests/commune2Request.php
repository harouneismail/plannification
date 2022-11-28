<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class commune2Request extends FormRequest
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
     * */
    public function rules()
    {
        return [
            'wilaya_id' => 'required',
            'mough_id' => 'required',
            'nomcommune' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'wilaya_id.required' => 'Ce Champs est Obligatoire de remplire',
            'mough_id.required' => 'Ce Champs est Obligatoire de remplir',
            'nomcommune.required' => 'Ce Champs est Obligatoire de remplir',
        ];
    }
}
