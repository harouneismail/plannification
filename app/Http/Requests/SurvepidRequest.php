<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurvepidRequest extends FormRequest
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
            'date_cas' => 'required',
            'menage_id' => 'required',
            'nature_cas' => 'required',
            'sexe' => 'required',
            'age' => 'required',
            'Liste' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'date_cas.required' => 'Remplir le Champs Date du Cas',
            'menage_id.required' => 'Remplir le Champs Numéro du Menage',
            'nature_cas.required' => 'Remplir le Champs Nature du Cas',
            'sexe.required' => 'Remplir le Champs Sexe',
            'age.required' => 'Remplir le Champs Age',
            'Liste.required' => 'Remplir le Champs Maladies'
        ];
    }
}
