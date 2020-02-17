<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Traits\LitJson;
use App\Http\Traits\UserTypeOutil;

use App\User;
use App\Models\Analyses\Anapack;
use App\Models\Analyses\Analyse;
use App\Models\Analyses\Anaacte;
use App\Models\Espece;
use App\Models\Eleveur;
use App\Models\Veto;

class ExtranetDemandeController extends Controller
{

      use LitJson, UserTypeOutil;

      protected $menu;

      public function __construct()
      {
        $this->menu = $this->litJson('menuExtranet');
      }

      public function choisir()
      {
        $especes = Espece::where('type', 'simple')->get();

        // Manip destinée à créer une liste d'Anapack par espèce pour toutes les especes simples
        $liste = Collect();

        $anapacks = Anapack::all();

        foreach ($especes as $espece) {

          $liste_anapack = Collect();

          foreach ($anapacks as $anapack) {

            foreach($anapack->especes as $anapack_espece) {

              if($espece->id == $anapack_espece->id) {

                $liste_anapack->push($anapack);
              }

            }

            $liste->put($espece->id, $liste_anapack);

            }

          }

        return view('extranet.choisir', [
          'menu' => $this->menu,
          'especes' => $especes,
          'liste' => $liste,
        ]);
      }

      public function formulaireDemande($espece_id, $anapack_id)
      {
        $especes = Espece::where('type', 'simple')->get();

        $anapacks = Anapack::all();

        $pays = $this->litJson("pays");

        $user = (auth()->user()) ? auth()->user() : "";

        return view('extranet.formulaireDemande', [
          'menu' => $this->menu,
          'espece_id' => $espece_id,
          'anapack_id' => $anapack_id,
          'especes' => $especes,
          'anapacks' => $anapacks,
          'user' => $user,
          'pays' => $pays,
        ]);
      }

      public function formulaireStore(Request $request)
      {
        $datas = $request->all();

        $user = User::where('email', $datas['email'])->get();

        if($user->isEmpty()) {
            $user = new User();
            $user->name = $datas['name'];
            $user->email = $datas['email'];
            $user->usertype = $this->userTypeEleveur()->id;
            dd($user);
        }
      }

      public function aide()
      {
        return "aide";
      }
}
