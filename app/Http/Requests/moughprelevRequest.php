<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class moughprelevRequest extends FormRequest
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
            'wilayaprelev_id' => 'required',
            'nommoughprelev' => 'required|unique:moughprelevs'
        ];
    }
    public function messages()
    {
        return [
            'wilayaprelev_id.required' => 'Ce Champs est Obligatoire de remplire',
            'nommoughprelev.required' => 'Ce Champs est Obligatoire de remplir',
            'nommoughprelev.unique' => 'Ce Nom est déja existé'
        ];
    }
}
