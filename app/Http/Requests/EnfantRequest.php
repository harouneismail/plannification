<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnfantRequest extends FormRequest
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
            'femme_id' => 'required',
            'nom_enfants' => 'required',
            'date_naissance_enfant' => 'required',
            'lieu_naissance' => 'required',
            'sexe' => 'required',
            'enrole' => 'required',
            'vivant' => 'required',
            'perimetre_brachial' => 'required',
            'tel_femme' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'menage_id.required' => 'Le Champs Menage est Obligatoire de Choisir un seul Menage',
            'femme_id.required' => 'Le Champs Femme est Obligatoire de choisir une seule femme',
            'nom_enfants' => 'Le Champs Nom de l\'Enfant est Obligatoire de Remplir',
            'date_naissance_enfant' => 'Le Champs Date de Naissance est Obligatoire de Remplir',
            'lieu_naissance' => 'Le Champs Lieu de Naissance est Obligatoire de Remplir',
            'sexe' => 'Le Champs Sexe est Obligatoire de Remplir',
            'enrole' => 'Le Champs Enrolé est Obligatoire de Remplir',
            'vivant' => 'Le Champs Vivant est Obligatoire de Remplir',
            'perimetre_brachial' => 'Le Champs Perimetre Brachial est Obligatoire de Remplir',
            'tel_femme' => 'Le Champs Teléphone de la Femme est Obligatoire de Remplir',

        ];
    }
}
