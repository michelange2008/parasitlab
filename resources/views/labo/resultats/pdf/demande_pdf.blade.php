<br>
<div class="text-center alert-secondary">

  <p class="pdf-titre">{{ ucfirst($demande->anapack->nom) }} (résultats)</p>

</div>

<table class="table table-bordered pdf-table">
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

  <table class="table table-bordered pdf-table">
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
    <td colspan="3">Aucun parasite recherché n'a été détecté</td>
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

@if ($demande->commentaire !== null)

  <p class="lignes">
    {!! nl2br($demande->commentaire->commentaire) !!}
  </p>

@endif
<hr>
<div class="text-right">

  <p class="lignes">
    Signée le {{ $demande->date_signature }} par {{ $demande->labo->user->name }}
  </p>
  <img width="250px" src="{!! 'storage/img/labo/signatures/'.$demande->labo->signature !!}" alt="">

</div>
