<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RapportRequest extends FormRequest
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
            'datedurapporatge' => 'date|required',
            'prenom' => 'required',
            'age_annee' => 'numeric|gte:0|nullable',
            'age_mois' => 'numeric|gte:0|nullable',
            'nomagentprelev' => 'alpha|nullable',
            'telagentprelev' => 'numeric|nullable',
            'dateapparitionsymptomes' => 'date|nullable|before_or_equal:datedurapporatge',
            'datepremierdose' => 'date|nullable|',
            'datedeuxiemedose' => 'date|nullable|after:datepremierdose',
            'structuredevaccination' => 'alpha|nullable',
            'nni' => 'numeric|nullable',
            'datedeguerie' => 'date|after_or_equal:datedurapporatge|nullable',
            'datededeces' => 'date|after_or_equal:datedurapporatge|nullable',


        ];
    }
}
