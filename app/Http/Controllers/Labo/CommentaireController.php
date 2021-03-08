<?php

namespace App\Http\Controllers\Labo;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productions\Commentaire;
use App\Mail\Pythie;
use Illuminate\Support\Facades\Mail;

use Carbon\Carbon;

class CommentaireController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pythie($commentaire_id)
    {
      $commentaire = Commentaire::find($commentaire_id);

      Mail::to('pythie@parasitlab.org')->send(new Pythie($commentaire));

      return redirect()->back()->with('message', 'pythie');
    }
}
