<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EleveurStore extends FormRequest
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
          'id' => 'integer|bail|required',
          'name' => 'string|bail|required|max:191',
          'email' => 'bail|required|email',
          'address_1' => 'string|required|max:191',
          'address_2' => 'string|nullable|max:191',
          'cp' => 'alpha_num|required|max:5',
          'commune' => 'string|required|max:191',
          'indicatif' => 'string|required|max:3',
          'tel' => 'string|required|max:10',
          'num' => 'nullable',
          'pays' => 'alpha_num',
          'veto_id' => 'nullable',
        ];
    }
}
