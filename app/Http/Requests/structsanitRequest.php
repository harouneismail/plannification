<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class structsanitRequest extends FormRequest
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
            'mough_id' => 'required',

            'nomstructsanit' => 'required|unique:structsanits'
        ];
    }
    public function messages()
    {
        return [
            'wilaya_id.required' => 'Le Champs Wilaya est Obligatoire de remplire',
            'mough_id.required' => 'Le Champs Moughataa est Obligatoire de remplire',
            'nomstructsanit.required' => 'Le Champs Commune est Obligatoire de remplire',
            'nomstructsanit.unique' => 'Ce Nom est déja existé'
        ];
    }
}
