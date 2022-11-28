<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class nommaladieRequest extends FormRequest
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
            'nommaladies' => 'required|unique:nommaladies',

        ];
    }
    public function messages()
    {
        return [
            'nommaladies.required' => 'Ce Champs est Obligatoire',
            'nommaladies.unique' => 'Ce Nom est déja existé'
        ];
    }
}
