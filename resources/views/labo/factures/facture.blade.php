@extends('layouts.app')

@extends('labo.laboMenu')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @titre(['titre' => $facture->user->name , 'soustitre' => "(facture)", 'icone' => 'factures.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10">

        @foreach ($demandes as $demande)

          <h4>{{ ucfirst($demande->anapack->nom) }} - ({{ $demande->date_reception }})</h4>

        @endforeach

      </div>

    </div>

  </div>

  <div class="row justify-content-center">

    <div class="col-md-10">

      <table class="table table-bordered">

        <thead>
          <tr class="text-center">
            <th>Acte</th>
            <th>Prix unitaire HT</th>
            <th>TVA</th>
            <th>Qtt</th>
            <th>Prix total HT</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($anaactes_factures as $anaacte_facture)

            <tr>
              <td>{{ ucfirst($anaacte_facture->anaacte->nom) }}</td>
              <td class="text-right">{{ $anaacte_facture->pu_ht }}</td>
              <td class="text-center">{{ ($anaacte_facture->tva->taux  * 100)." %"}}</td>
              <td class="text-center">{{ $anaacte_facture->nombre }}</td>
              <td class="text-right">{{ number_format($anaacte_facture->pu_ht * $anaacte_facture->nombre, 2, ",", " "). " €" }}</td>
            </tr>

          @endforeach

          <tr>
            <td colspan="5"></td>
          </tr>

          <tr class="font-weight-bold">
            <td colspan="4">Totalt HT</td>
            <td class="text-right">{{ $somme_facture->total_ht }}</td>
          </tr>
          <tr>
            <td colspan="5"></td>
          </tr>
          <tr class="font-weight-bold">
            <td colspan="4">Totalt TTC</td>
            <td class="text-right">{{ $somme_facture->total_ttc }}</td>
          </tr>
        </tbody>

      </table>

    </div>

  </div>

@endsection
