<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRapportRequest extends FormRequest
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
            'structsanit_id' => 'required',
            'datedurapporatge' => 'required',
            'prenom' => 'required',
            'age_annee' => 'numeric|gte:0|nullable',
            'age_mois' => 'numeric|gte:0|nullable',
            'nomagentprelev' => 'alpha|nullable',
            'telagentprelev' => 'numeric|nullable',
            'dateapparitionsymptomes' => 'date|nullable',
            'datepremierdose' => 'date|nullable',
            'datedeuxiemedose' => 'date|nullable',
            'structuredevaccination' => 'alpha|nullable',
            'nni' => 'numeric|nullable',
            'datedeguerie' => '',
            'datedeguerie' => 'gte:datedurapporatge',
            'datededeces' => '',
            'datededeces' => 'gte:datedurapporatge'


        ];
    }
}
