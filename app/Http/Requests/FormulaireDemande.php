<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Productions\Signe;

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
      $demande = [
        'name' => 'string|bail|required|max:191',
        'email' => 'bail|required|email',
        'address_1' => 'string|required|max:191',
        'address_2' => 'string|nullable|max:191',
        'cp' => 'alpha_num|required|max:5',
        'commune' => 'string|required|max:191',
        'indicatif' => 'string|required|max:3',
        'tel' => 'string|required|max:10',
        'veto' => 'string|nullable|max:191',
        'num' => 'string|max:191|nullable',
        'espece_id' => 'string|required|max:2',
        'anatype_id' => 'string|required|max:2',
        'anaacte_id' => 'string|required|max:2',
        'date_prelevement' => 'date|required',
        'informations' => 'string|nullable',
        'nb_prelevement' => 'integer|required|between:1,10',
      ];
      $signes = Signe::all();

      for ($i=1; $i < 11 ; $i++) {

        $demande['p_'.$i] = 'string|nullable|max:20';

        $demande['parasite_'.$i] = 'string';

        for ($j=1; $j <= $signes->count() ; $j++) {

          $demande['signe_'.$i.'_'.$j] = 'string|nullable';

        }

      }

        return $demande;
    }
}
