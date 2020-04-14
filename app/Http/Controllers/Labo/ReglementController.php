<?php

namespace App\Http\Controllers\Labo;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Productions\Facture;
use App\Models\Productions\Reglement;

class ReglementController extends Controller
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

        $reglement = new Reglement();

        $reglement->modereglement_id = $datas['modereglement_id'];
        $reglement->date_reglement = $datas['payee_date'];

        $reglement->save();

        DB::table('factures')->where('id', $datas['facture_id'])->update(['payee' => true, 'reglement_id' => $reglement->id]);

        return redirect()->route('factures.index')->with('message', 'reglement_fait');

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

        DB::table('factures')->where('reglement_id', $id)->update(['payee' => false]); // On passe la facture à non réglée

        Reglement::destroy($id);

        return redirect()->back()->with('message', 'reglement_delete');
    }
}
