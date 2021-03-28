<?php

namespace App\Http\Controllers\Labo;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productions\Commentaire;
use App\Mail\Pythie;
use Illuminate\Support\Facades\Mail;

use Carbon\Carbon;

/**
 * Contrôleur de la classe Commentaire: commentaire fait sur le résultat d'une analyse
 *
 * Ce n'est pas vraiment un contrôler CRUD car un commentaire n'existe pas sans être
 * attaché à un résultat d'analyse.
 *
 * Pour cette raison, il n'y a que la méthode _store_ qui est implémentée.
 *
 * Par contre, il possède une méthdoe particulière _pythie_ destinée à envoyer
 * un mail si besoin
 *
 * @package Productions
 */
class CommentaireController extends Controller
{

    /**
     * Non implémenté
     */
    public function index()
    {
        //
    }

    /**
     * Non implémenté
     */
    public function create()
    {
        //
    }

    /**
     * Enregistreun nouveau commentaire sur une demande d'analyse (en fait surtout
     * concernant son résultat)
     *
     * Methode appelée par formulaire de la vue labo/resultats/inputCommentaire.blade.php
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Redirect demandes/{demande_id}
     */
    public function store(Request $request)
    {
      $datas = $request->all();

      $commentaire = Commentaire::updateOrCreate(
                    ['demande_id'=> $datas['demande_id']],
                    [
                      'commentaire' => $datas['commentaire'],
                      'date_commentaire' => Carbon::now(),
                      'labouser_id' => auth()->user()->id,
                    ]);

      return redirect()->back()->with('comment', 'comment_store');

      }

    /**
     * Non implémenté
     */
    public function show($id)
    {
        //
    }

    /**
     * Non implémenté
     */
    public function edit($id)
    {
        //
    }

    /**
     * Non implémenté
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Non implémenté
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Methode destinée à envoyer un mail à pythie@parasitlab.org pour demander
     * de l'aide.
     *
     * appelée par le bouton help de la vue labo/resultats/inputCommentaire.blade.php
     *
     * @param  int Id du Commentaire
     * @return redirect back to demandes/{demande_id}
     */
    public function pythie($commentaire_id)
    {
      $commentaire = Commentaire::find($commentaire_id);

      Mail::to('pythie@parasitlab.org')->send(new Pythie($commentaire));

      return redirect()->back()->with('message', 'pythie');
    }
}
