<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormulaireDemande extends FormRequest
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
          'name' => 'string|bail|required|max:191',
          'email' => 'bail|required|email',
          'address_1' => 'string|required|max:191',
          'address_2' => 'string|nullable|max:191',
          'cp' => 'alpha_num|required|max:5',
          'commune' => 'string|required|max:191',
          'indicatif' => 'string|required|max:3',
          'tel' => 'string|required|max:10',
          'veto' => 'string|nullable|max:191',
          'num' => 'string|required|max:191',
          'espece_id' => 'string|required|max:2',
          'anapack_id' => 'string|required|max:2',
          'date_prelevement' => 'date|required',
          'informations' => 'string|nullable',
          'nb_prelevement' => 'integer|required|between:1,10',
          'p_1' => 'string|nullable|max:20',
          'p_2' => 'string|nullable|max:20',
          'p_3' => 'string|nullable|max:20',
          'p_4' => 'string|nullable|max:20',
          'p_5' => 'string|nullable|max:20',
          'p_6' => 'string|nullable|max:20',
          'p_7' => 'string|nullable|max:20',
          'p_8' => 'string|nullable|max:20',
          'p_9' => 'string|nullable|max:20',
          'p_10' => 'string|nullable|max:20',
        ];
    }
}
