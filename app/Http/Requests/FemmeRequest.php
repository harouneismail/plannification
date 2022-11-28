<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FemmeRequest extends FormRequest
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
            'menage_id' => 'required',
            'nnifemme' => 'required|min:10|max:10|unique:femmes',
            'date_naissance' => 'required|date',
            'nom_femme' => 'required',
            'femme_enceinte' => 'required',
            'femme_allaitante' => 'required',
            'cpn1' => 'different:date_naissance',

        ];
    }
    public function messages()
    {
        return [
            'menage_id.required' => 'Le Champs Menage est Obligatoire de Remplire',
            'nnifemme.required' => 'Le Champs NNI est Obligatoire de Remplire',
            'nnifemme.min' => 'Le Champs NNI ne doit pas depasser 10 chiffres',
            'nnifemme.max' => 'Le Champs NNI ne doit pas depasser 10 chiffres',
            'nnifemme.unique' => 'Ce NNI est déja existé dans la Base de Données',
            'date_naissance.required' => 'Le Champs Date de Naissance est Obligatoire de Remplire',
            'nom_femme.required' => 'Le champs Nom de la femme est Obligatoire de remplire',
            'femme_enceinte.required' => 'Le Champs Femme Enceinte est Obligatoire de Remplire',
        ];
    }
}
