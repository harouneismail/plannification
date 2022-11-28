<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class moughRequest extends FormRequest
{

    /* Determine if the user is authorized to make this request.
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
            'nommough' => 'required|unique:moughs'
        ];
    }
    public function messages()
    {
        return [
            'wilaya_id.required' => 'Ce Champs est Obligatoire de remplire',
            'nommough.required' => 'Ce Champs est Obligatoire de remplir',
            'nommough.unique' => 'Ce Nom est déja existé'
        ];
    }
}
