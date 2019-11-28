<?php

namespace App\Http\Controllers\Labo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

use App\Http\Traits\LitJson;
use App\Http\Traits\FormatTel;
use App\User;
use App\Models\Eleveur;
use App\Models\Espece;
use App\Models\Analyses\Anapack;
use App\Models\Veto;
use App\Models\Usertype;
use App\Models\Productions\Demande;

class DemandeController extends Controller
{
    use LitJson, FormatTel;

    protected $menu;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->menu = $this->litJson("menuLabo");
    }

    public function index()
    {
      $intitules = $this->LitJson("tableauDemandes");

      $demandes = Demande::all();

      return view('labo.laboIndex', [
          "menu" => $this->menu,
          "intitules" => $intitules,
          "demandes" => $demandes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eleveurs = Eleveur::all();
        $especesSimple = Espece::where('type', 'simple')->get();
        $anapacks = Anapack::all();
        $user_vetos = Veto::all();
        $usertypes = Usertype::all();

        return view('labo.demandeCreate', [
          'menu' => $this->menu,
          'eleveurs' => $eleveurs,
          'especes' => $especesSimple,
          'anapacks' => $anapacks,
          'vetos' => $user_vetos,
          'usertypes' => $usertypes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $datas = $request->all();

      // On recherche les _id des différentes variables de la demande
      $user = User::where('name', $datas['user'])->first();
      $espece = Espece::select('id')->where('nom', $datas['espece'])->first();
      $anapack = Anapack::select('id')->where('nom', $datas['anapack'])->first();

      // Si la case à cocher "envoi au véto" es cochée, on recherche l'id du véto choisi
      if(isset($datas['toveto']))
      {
        $user_veto = DB::table('users')
        ->join('vetos', 'user_id', '=', 'users.id')
        ->where('users.name', $datas['veto'])
        ->first();
        $user_veto_id = $user_veto->id;
      }
      // Sinon le "veto_id" est passé à null
      else {
        $user_veto_id = null;
      }
      // Envoi de la facture
      $facture_usertype = Usertype::select('id')->where('nom', $datas['facture'])->first();
      // dd($user->usertype_id);

      if(isset($datas['toveto']))
      {
        if($facture_usertype->id === $user_veto->usertype_id)
        {
          $destinataire_facture = $user_veto;
        }
        elseif($facture_usertype->id === $user->usertype_id)
        {
          $destinataire_facture = $user;
        }
        else {
          $destinataire_facture = auth()->user();
        }
      }
      else if($facture_usertype->id === $user->usertype_id)
      {
        $destinataire_facture = $user;
      }
      else {
        $destinataire_facture = auth()->user();
      }

      $nouvelle_demande = new Demande();
      $nouvelle_demande->user_id = $user->id;
      $nouvelle_demande->espece_id = $espece->id;
      $nouvelle_demande->anapack_id = $anapack->id;
      $nouvelle_demande->toveto = isset($datas['toveto']);
      $nouvelle_demande->veto_id = $user_veto_id;
      $nouvelle_demande->facture = $destinataire_facture->id;
      $nouvelle_demande->prelevement = $datas['prelevement'];
      $nouvelle_demande->reception = $datas['reception'];

      $nouvelle_demande->save();

      return redirect('laboratoire')->with('status', "La nouvelle demande d'analyse est enregistrée");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $demande = Demande::find($id);
      $demande->user->eleveur->tel = $this->ajouteEspaceTel($demande->user->eleveur->tel);

        return view('labo.demandeShow', [
          'menu' => $this->menu,
          'demande' => $demande,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      Demande::where('id', $id)->delete();

        return redirect()->route('demandes.index')->with('status', "La demande d'analyse a été supprimée");

    }
}
