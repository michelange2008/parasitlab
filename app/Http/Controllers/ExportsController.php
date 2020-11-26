<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Espece;
use App\Models\Productions\Demande;
use App\Models\Productions\Prelevement;
use App\Models\Productions\Resultat;
use App\Models\Analyses\Anaitem;
use App\Models\Analyses\Analyse;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ResultatsExport;
use App\Http\Traits\LitJson;
use App\Http\Traits\UserTypeOutil;
use Carbon\Carbon;

class ExportsController extends Controller
{
  use LitJson, UserTypeOutil;

  protected $menu;
  protected $formats;
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function __construct()
  {
    $this->menu = $this->litJson("menuLabo");
    $this->formats = $this->litJson('formats_export');
  }


  public function choix()
  {

    $users = User::all();
    $demandes = Demande::all();
    $especes = Espece::orderBy('nom')->get();
    $anaitems = Anaitem::orderBy('nom')->get();
    $de = new Carbon(Demande::min('date_prelevement'));
    $a = new Carbon(Demande::max('date_prelevement'));

    return view('exports.choix', [
      'menu' => $this->menu,
      'formats' => $this->formats,
      'especes' => $especes,
      'users' => $users,
      'eleveurs' => User::where('usertype_id', $this->userTypeEleveur()->id)->orderBy('name')->get(),
      'vetos' => User::where('usertype_id', $this->userTypeVeto()->id)->orderBy('name')->get(),
      'anaitems' => $anaitems,
      'de' => $de->toDateString(),
      'a' => $a->toDateString(),
      ]);

    }

    public function comptage(Request $request)
    {
      $resultats = $this->resultats($request->all());

      return $resultats->count();
    }

    public function export(Request $request)
    {
      $datas = $request->all();

      $resultats = $this->resultats($datas);

      $export = [];
      foreach ($resultats as $resultat) {

        $export[] =[
          "nom" => $resultat->prelevement->demande->user->name,
          "parasite" => $resultat->anaitem->nom,
          "valeur" => $resultat->valeur,
        ];

      }
// dd($export);
      foreach ($this->formats as $format) {

        switch ($datas['format']) {
          case 'csv':

          $nom_fichier = "export_copro.csv";

          $headers = array(
          "Content-type"        => "text/csv",
          "Content-Disposition" => "attachment; filename=$nom_fichier",
          "Pragma"              => "no-cache",
          "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
          "Expires"             => "0"
          );

          $columns = array("nom", "date_prelevement", "parasite", "résultat");

          $callback = function() use($resultats, $columns) {

            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($resultats as $ligne) {

              $row['nom'] = $ligne->prelevement->demande->user->name;
              $row['date_prelevement'] = $ligne->prelevement->demande->date_prelevement;
              $row['parasite'] = $ligne->anaitem->nom;
              $row['résultats'] = $ligne->valeur;

              fputcsv($file, array($row['nom'], $row['date_prelevement'], $row['parasite'], $row['résultats']));
            }

            fclose($file);

          };
          return response()->stream($callback, 200, $headers);
            

            break;

          default:

            return redirect()->route('exports.choix');

            break;
        }

    }
  }

    public function resultats($datas)
    {
      // Si on choisit toutes les especes, il faut aller chercher la totalité de id
      if ($datas['especes'][0] == "all") {

        $especes = Espece::all();

        foreach ($especes as $espece) {

          $liste_especes[] = $espece->id;

        }

      } else {

        $liste_especes = $datas['especes'];
      }

      $demandes = Demande::select('id')->where('user_id', 'like', $datas['eleveur'])
      ->where('tovetouser_id', 'like', $datas['veto'])
      ->whereIn('espece_id', $liste_especes)
      ->where('date_prelevement', '>=', $datas['de'])
      ->where('date_prelevement', '<=', $datas['a'])
      ->get();

      $prelevements = collect();

      foreach ($demandes as $demande) {
        $prelevement_par_demande = Prelevement::where('demande_id', $demande->id)->get();
        $prelevements = $prelevements->concat($prelevement_par_demande);
      }

      if($datas['anaitems'][0] == "all") {

        $anaitems = Anaitem::all();

        foreach ($anaitems as $anaitem) {

          $liste_anaitems[] = $anaitem->id;

        }

      } else {

        $liste_anaitems = $datas['anaitems'];

      }

      $resultats = collect();

      foreach ($prelevements as $prelevement) {
        $resultats_par_prelevement = Resultat::where('prelevement_id', $prelevement->id)
        ->whereIn('anaitem_id', $liste_anaitems)
        ->get();
        $resultats = $resultats->concat($resultats_par_prelevement);
      }

      return $resultats;
    }

    public function exportxlsx($export)
    {
      dd($export);
      return Excel::download(new ResultatsExport, 'resultats.xlsx');
    }

    public function exportcsv($resultats)
    {
      $nom_fichier = "export_copro.csv";

      $headers = array(
      "Content-type"        => "text/csv",
      "Content-Disposition" => "attachment; filename=$nom_fichier",
      "Pragma"              => "no-cache",
      "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
      "Expires"             => "0"
      );

      $columns = array("nom", "date_prelevement", "parasite", "résultat");

      $callback = function() use($resultats, $columns) {

        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($resultats as $ligne) {

          $row['nom'] = $ligne->prelevement->demande->user->name;
          $row['date_prelevement'] = $ligne->prelevement->demande->date_prelevement;
          $row['parasite'] = $ligne->anaitem->nom;
          $row['résultats'] = $ligne->valeur;

          fputcsv($file, array($row['nom'], $row['date_prelevement'], $row['parasite'], $row['résultats']));
        }

        fclose($file);

      };
      return response()->stream($callback, 200, $headers);
    }
    /**
    * Requête ajax dans la page choix pour afficher uniquement les parasites d'une espece donnée.
    */
    public function anaitemsFromEspece($especes)
    {
      $especes = explode(',', $especes);

      $analyses = Analyse::whereIn('espece_id', $especes)->get();
      $anaitems = collect();
      $analyses_id = [];
      foreach ($analyses as $analyse) {

        foreach ($analyse->anaitems as $anaitem) {

          $anaitems->push([ 'id' => $anaitem->id , 'nom' => ucfirst($anaitem->nom) ]);

        }
      }

      $anaitems = $anaitems->unique();

      $anaitems = $anaitems->sortBy('nom');

      return json_encode($anaitems->values()->all());
    }
  }
