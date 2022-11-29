<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CanavasRequest extends FormRequest
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
        'axe_id'=>'required',
        'composante_id'=>'required',
        'souscomposante_id'=>'required',
        'actionintervention_id'=>'required',
        'interventioncle_id'=>'required',
        'activite'=>'required',
        'typeactivite_id'=>'required',
        'sourcefinancement_id'=>'required',
        'periode1'=>'periode1',
        'periode2'=>'periode2',
        'periode3'=>'periode3',
        'periode4'=>'periode4',
        'montant_cout'=>'required',
        ];
    }
    public function messages()
    {
        return [
        'axe_id.required'=>'Selectionner le Programme',
        'composante_id.required'=>'Selectionner le sous-programme',
        'souscomposante_id.required'=>'Selectionner la Composante',
        'actionintervention_id.required'=>'Selectionner la Stratégie',
        'interventioncle_id.required'=>'Selectionner l\'Intervnetion Cles',
        'activite.required'=>'Selectionner l\'Activité',
        'typeactivite_id.required'=>'Selectionner le Type d\'Activité',
        'sourcefinancement_id.required'=>'Selectionner la Source de Finacement',
        'montant_cout.required'=>'Selectionner le Budget',
        ];
    }
}
