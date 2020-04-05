<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Illuminate\Http\Request;
use App\Http\Requests\FormulaireDemande;
use App\Http\Requests\FormulaireEnvoiPack;
use App\Http\Traits\LitJson;
use App\Http\Traits\UserTypeOutil;
use App\Http\Traits\FormatDate;

use Illuminate\Mail\Mailer;
use App\Mail\EnvoiPack;

use App\User;
use App\Models\Analyses\Anapack;
use App\Models\Analyses\Anatype;
use App\Models\Analyses\Analyse;
use App\Models\Analyses\Anaacte;
use App\Models\Productions\Demande;
use App\Models\Productions\Prelevement;
use App\Models\Productions\Signe;
use App\Models\Espece;
use App\Models\Eleveur;
use App\Models\Veto;
use App\Models\Categorie;
use App\Models\Observation;

class ExtranetDemandeController extends Controller
{

      use LitJson, UserTypeOutil, FormatDate;

      protected $menu;

      public function __construct()
      {
        $this->menu = $this->litJson('menuExtranet');
      }

      public function choisir()
      {
        $especes = Espece::all();

        return view('extranet.analyses.choisir', [
          'menu' => $this->menu,
          'sousmenuAnalyses' => $this->litJson('sousmenuAnalyses'),
          'especes' => $especes,
          'categories' => Categorie::all(),
        ]);
      }

      public function formulaireDemande($espece_id, $anatype_id)
      {
        session()->forget('demande'); // suppression de l'objet mis en session par la méthode formulaireStore

        $pays = $this->litJson("pays");

        $estParasite = $this->litJson('estParasite');

        $user = (auth()->user()) ? auth()->user() : "";

        return view('extranet.analyses.formulaireDemande', [
          'menu' => $this->menu,
          'espece_id' => $espece_id,
          'anatype_id' => $anatype_id,
          'especes' => Espece::all(),
          'anatypes' => Anatype::all(),
          'signes' => Signe::all(),
          'estParasite' => $estParasite,
          'user' => $user,
          'personne' => $this->personne(),
          'pays' => $pays,
        ]);
      }

      /*
      * Il ne s'agit pas réellement de stocker la demande d'analyse mais de metttre
      * en forme les données pour écrire le pdf téléchargeable
      */

      public function formulaireStore(FormulaireDemande $request)
      {
        $datas = $request->validated();
        // dd($datas);


        foreach ($datas as $key => $data) {
          $datas[$key] = trim(strip_tags($data));
        }
        $user = User::select('id', 'name', 'email')->where('email', $datas['email'])->first();
        if($user == null) {
            $user = new User();
            $user->id = 10000;
            $user->name = $datas['name'];
            $user->email = $datas['email'];
            $user->usertype = $this->userTypeEleveur()->id;
            $eleveur = new Eleveur();
            $eleveur->user_id = $user->id;
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
        $demande->id = 10000;
        $demande->user_id = $user->id;
        $demande->nb_prelevement = intVal($datas['nb_prelevement']);
        $demande->espece_id = $datas['espece_id'];
        $demande->anaacte_id = $datas['anaacte_id'];
        $demande->informations = $datas['informations'];
        $demande->date_prelevement = $this->dateReadable($datas['date_prelevement']);
        $demande->toveto = ($datas['veto'] == null) ? false : true;
        $demande->veto = $datas['veto'];

        $prelevements = Collect();

        for ($i=1; $i < $datas['nb_prelevement'] + 1 ; $i++) {

              $prelevement = Collect();
              $prelevement->identification = ($datas['p_'.$i]== null) ? "lot n°".$i : $datas['p_'.$i];
              $prelevement->parasite = $datas['parasite_'.$i];

              $liste_signes = Signe::all();
              $signes = Collect();

              $prelevement->put('signes', $signes);

              foreach ($liste_signes as $signe) {

                if(isset($datas['signe_'.$i.'_'.$signe->id])) {

                  $prelevement['signes']->push($signe->nom);

                }

              }
              $prelevements->push($prelevement);
        }
        $demande->prelevements = $prelevements;
        $demande->user = $user;
        $demande->eleveur = $eleveur;

        session(['demande' =>$demande]);

        return redirect()->route('formulaire');

       }

       /*
       * Page de formulaire de demande d'envoi d'un pack
       */
       public function envoiPack()
       {

         $cout_pack = Anaacte::select('pu_ht')->where('abbreviation', 'kit envoi')->first()->pu_ht;

         return view('extranet.analyses.enpratique.envoiPack', [
           'menu' => $this->menu,
           'pays' => $this->litJson('pays'),
           'user' => auth()->user(),
           'personne' => $this->personne(),
           'cout_pack' => $cout_pack,
         ]);
       }

       /*
       * Récupération des données du formulaire ci-dessus
       */
       public function envoiPackStore(FormulaireEnvoiPack $request)
       {

         $demande = $request->validated();

         $mail = Mail::to(config('mail')['from']['address'])->send(new EnvoiPack($demande));

         return view('extranet.analyses.enpratique.envoiPackOk');

       }


// DEUX METHODES POUR RECUPERER DES DONNES PAR AJAX (choisir.js)
// // Pour avoir les anatypes qui correspondent à une espece donnee
//        public function anatypeSelonEspece($espece_id)
//        {
//          $anatypes = DB::table('anatypes')
//                         ->join('anatype_espece', 'anatypes.id', '=', 'anatype_espece.anatype_id')
//                         ->where('anatype_espece.espece_id', $espece_id)
//                         ->get();
//
//          return json_encode($anatypes);
//        }
// // Pour avoir les anaactes qui correspondent à un anatype donné
//        public function anaacteSelonAnatype($anatype_id)
//        {
//          $anaactes = Anaacte::where('anatype_id', $anatype_id)->get();
//
//          return json_encode($anaactes);
//        }

       // Issu du choisir.js -
       // Renvoie la liste des Observations pour une espece donnée
       public function observationSelonEspece($espece_id)
       {
         $espece = Espece::find($espece_id);

         $observations = $espece->observations;

         return json_encode($observations);
       }

       // Issu du choisir.js
       // Renvoie la liste des analyses proposées selon l'espece et une liste d'observations
       // Utilise les tables pivot espece_observation et anaacte_observation
       // renvoie un json avec seulement les analyses les plus fréquentes
       // Une manip permet de remonter le score des deux analyses particulières (haemonchus et resistance)
       public function analyseSelonObservations($espece_id, $liste)
       {
         // On récupère toutes les observations
         $observations = Observation::find(explode('_', $liste));

         $liste_anatypes = Analyse::select('anatype_id')->where('espece_id', $espece_id)->get();
         $types = Collect();

         foreach ($liste_anatypes as $anatype) {
           $types->push($anatype->anatype_id);
         }

         $nb_observation = count(explode(',', $liste));

         // On crée une nouvelle collection
         $analyses = Collect();
         // Qu'on peuple en passant en revue les différentes observations
         foreach ($observations as $observation) {
           // Les analyses attachées à ces observations
           foreach ($observation->anaactes as $anaacte) {
             if($types->contains($anaacte->anatype->id)) {

               $item = Collect(); // Nouvelle collection pour chaque analyse
               $item->put("type",$anaacte->anatype->nom); // On y met le nom du type
               $item->put("acte", $anaacte->nom); // On y met le détait (anaacte)
               $item->put("estSpecial", $anaacte->anatype->estSpecial ); // on rajoute l'attribut de certains types (résitances, haemonchus),
               $item->put("id" ,$anaacte->id); // Et l'id
               $analyses->push($item); // Et on rentre tout ça dans la collection initiale
             }
           }
         }

        $freq_analyses = $analyses->countBy('id')->values(); // On crée une nouvelle collection qui compte la fréquence de chaque analyse
        $freq_analyses_max = $freq_analyses->max();
        $analyses_uniques = $analyses->unique()->values(); // On élimine les doublons

        // et on assoocie les deux collections
        for ($i=0; $i < $freq_analyses->count() ; $i++) {

          $analyses_uniques[$i]->put("nb", $freq_analyses[$i]);
            $analyses_uniques[$i]->put("max", $freq_analyses_max);

        }
        $analyses_ponderees = $analyses_uniques->map(function($item, $key) {
          if($item['estSpecial'] == 1) {
            $item->estSpecial = $item['max'];

          }
          return $item;
        });

        $synthese = $analyses_ponderees->whereBetween("nb", [$freq_analyses_max-1, $freq_analyses_max]);

         return json_encode($synthese->groupBy("type"));
       }

}
