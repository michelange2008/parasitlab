<?php

namespace App\Http\Controllers\Labo;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;

class CommentaireController extends Controller
{

    protected $demande_id;

    public function __construct($demande_id)
    {

      $this->demande_id = $demande_id;

    }
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
    public function store($commentaire)
    {
      
        DB::table('commentaires')->updateOrInsert(
          [
            'demande_id' => $this->demande_id,
          ],
          [
          'demande_id' => $this->demande_id,
          'commentaire' => $commentaire,
          'date_commentaire' => Carbon::now(),
          'labo_id' => auth()->user()->labo->id,
          ]
        );

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
}
