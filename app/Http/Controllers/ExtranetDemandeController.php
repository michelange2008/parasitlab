<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormulaireDemande;
use App\Http\Traits\LitJson;
use App\Http\Traits\UserTypeOutil;

use App\User;
use App\Models\Analyses\Anapack;
use App\Models\Analyses\Analyse;
use App\Models\Analyses\Anaacte;
use App\Models\Productions\Demande;
use App\Models\Productions\Prelevement;
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

      public function formulaireStore(FormulaireDemande $request)
      {
        $datas = $request->validated();

        foreach ($datas as $key => $data) {
          $datas[$key] = trim(strip_tags($data));
        }

        $user = User::select('id', 'name', 'email')->where('email', $datas['email'])->first();

        if($user == null) {
            $user = new User();
            $user->name = $datas['name'];
            $user->email = $datas['email'];
            $user->usertype = $this->userTypeEleveur()->id;
            $eleveur = new Eleveur();
            $eleveur->address_1 = $datas['address_1'];
            $eleveur->address_2 = $datas['address_2'];
            $eleveur->cp = $datas['cp'];
            $eleveur->commune = $datas['commune'];
            $eleveur->indicatif = $datas['indicatif'];
            $eleveur->tel = $datas['tel'];
            $eleveur->num = $datas['num'];
        } else {
          $eleveur = Eleveur::where('user_id', $user->id)->first();
        }

        $demande = new Demande();
        $demande->espece_id = $datas['espece_id'];
        $demande->anapack_id = $datas['anapack_id'];
        $demande->date_prelevement = $datas['date_prelevement'];
        $demande->informations = $datas['informations'];
        $demande->toveto = ($datas['veto'] == null) ? false : true;
        $demande->veto = $datas['veto'];
        $demande->nb_prelevement = intVal($datas['nb_prelevement']);

        $prelevements = Collect();

        for ($i=1; $i < $datas['nb_prelevement'] + 1 ; $i++) {

              $prelevement = new Prelevement();
              $prelevement->identification = $datas['p_'.$i];
              $prelevements->push($prelevement);
        }

        $formulaireDemande = Collect();
        $formulaireDemande->push($user);
        $formulaireDemande->push($eleveur);
        $formulaireDemande->push($demande);
        $formulaireDemande->push($prelevements);

        session(['formulaire' =>$formulaireDemande]);

        return view('extranet.telechargerFormulaire', [
          'menu' => $this->menu,
        ]);
       }

       public function telechargerFormulaire($formulaireDemande)
       {
         // code...
       }

}
