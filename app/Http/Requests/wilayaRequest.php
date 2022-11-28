<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class wilayaRequest extends FormRequest
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
            'nomwilaya' => 'required|unique:wilayas',

        ];
    }
    public function messages()
    {
        return [
            'nomwilaya.required' => 'Ce Champs est Obligatoire',
            'nomwilaya.unique' => 'Ce Nom est déja existé'
        ];
    }
}
