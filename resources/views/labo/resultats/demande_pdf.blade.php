  <div style="margin-left:380px; border: 1px solid black; padding-left:20px">

    <p class="adresseNom">{{ $demande->user->name }}</p>
    <p class="adresse">{{ $demande->user->eleveur->address_1 }}</p>
    <p class="adresse">{{ $demande->user->eleveur->address_2 }}</p>
    <p class="adresse">{{ $demande->user->eleveur->cp }} {{ $demande->user->eleveur->commune }}</p>

  </div>

<br>
<div class="text-center alert-secondary">

  <p class="pdf-titre">{{ ucfirst($demande->anapack->nom) }} (résultats)</p>

</div>

<table class="table table-bordered">
  <tr>
    <td>Espèce : <strong>{{ mb_strtoupper($demande->espece->nom) }}</strong></td>
    <td>Date de réception: <strong>{{ $demande->date_reception}}</strong></td>
    <td>Nb de prélèvements: <strong>{{ $demande->nb_prelevement}}</strong></td>
  </tr>
  @if ($demande->anapack->serie)
    <tr>
      <td colspan="3">
          Cette demande d'analyse fait partie d'un pack qui compte 3 séries de prélèvement
      </td>
    </tr>
  @endif
</table>

@foreach ($demande->prelevements as $prelevement)

  <table class="table table-bordered" style="font-size:0.9rem">
    <tr class="pdf-table-titre">
      <td colspan="3" class="ligne1"><strong>{{ mb_strtoupper($prelevement->identification)}}</strong> (prelevement n°{{ $loop->index + 1}} -
        <span class="lignes">
          état du prélèvement: <strong>{{ $prelevement->etat->nom }}</strong>
         - consistance: <strong>{{ $prelevement->consistance->nom }})</strong>
       </span>
     </td>
    </tr>

@if ($prelevement->toutNegatif)

  <tr>
    <td colspan="3" class="adresseNom">Aucun parasite recherché n'a été détecté</td>
  </tr>

@else


  @foreach ($prelevement->resultats as $resultat)
    <tr>
      <td class="ligne1">
        {{$resultat->anaitem->nom}}
      </td>
      <td class="lignes text-right">
        {{$resultat->valeur}}
      </td>
      <td class="lignes">
        {{$resultat->anaitem->unite->nom}}
      </td>
    </tr>
  @endforeach

  {{-- <div class="page-break"></div> --}}

@endif

<tr>
  <td colspan="3">
    <p class="lignes"><span class="font-italic">Parasites recherchés mais non détectés: </span>

      @foreach ($prelevement->nonDetecte as $nondetecte)

        @if ($loop->first)

          {{ucfirst($nondetecte)}},

        @elseif ($loop->last)

          {{$nondetecte}}.

        @else

          {{$nondetecte}},

        @endif

      @endforeach
    </p>
  </td>
</tr>

  </table>
@endforeach