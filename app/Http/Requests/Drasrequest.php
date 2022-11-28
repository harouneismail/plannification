<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Drasrequest extends FormRequest
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
            'wilaya_id' => 'required',
            'name_directeurregional' => 'required|unique:directeurregionals',

        ];
    }
    public function messages()
    {
        return [
            'wilaya_id.required' => 'Ce Champs est Obligatoire de remplire',
            'name_directeurregional.required' => 'Ce Champs est Obligatoire de remplir',
            'name_directeurregional.unique' => 'Ce Nom est déja Existé',
        ];
    }
}
