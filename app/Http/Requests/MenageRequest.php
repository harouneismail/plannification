<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenageRequest extends FormRequest
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
            'nni' => 'required|min:10|max:10|unique:menages',
            'nom_chef_menage' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'nni.required' => 'Le Numéro Nationel d\'Identité est Obligatoire de remplire',
            'nni.unique' => 'Ce Numéro déja Existé dans La Base de Données',
            'nom_chef_menage.required' => 'Le Nom de Chef du Menage est Obligatoire de remplire'

        ];
    }
}
