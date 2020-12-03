<br>
<div class="text-center alert-secondary">

  <p class="pdf-titre">{{ ucfirst($demande->anaacte->anatype->nom) }} (@lang('demandes.results'))</p>

</div>

<table class="table table-bordered pdf-table">
  <tr>
    <td>@lang('tableaux.espece') : <strong>{{ mb_strtoupper($demande->espece->nom) }}</strong></td>
    <td>@lang('tableaux.date_reception') <strong>{{ \Carbon\Carbon::parse($demande->date_reception)->isoFormat('LL') }}</strong></td>
    <td>@lang('form.nb_prelevement'): <strong>{{ $demande->nb_prelevement}}</strong></td>
  </tr>
  @if ($demande->anaacte->serie)
    <tr>
      <td colspan="3">
          @lang('form.demande_serie')
      </td>
    </tr>
  @endif
</table>

@foreach ($demande->prelevements as $prelevement)

  <table class="table table-bordered pdf-table">
    <tr class="pdf-table-titre">
      <td colspan="3" class="ligne1"><strong>{{ mb_strtoupper($prelevement->identification) ?? ''}} {{ $prelevement->animal->numero ?? '' }}</strong> ( @lang('commun.prelev_n') {{ $loop->index + 1}}) -
        <span class="lignes">
          @lang('form.etat_prelev'): <strong>{{ $prelevement->etat->nom }}</strong>
       </span>
     </td>
    </tr>

@if ($prelevement->toutNegatif)

  <tr>
    <td colspan="3">@lang('demandes.0_resultat')</td>
  </tr>

@else


  @foreach ($prelevement->resultats as $resultat)

    @if ($resultat->positif)

      <tr>
        <td class="ligne1">
          {{$resultat->anaitem->nom}}
        </td>
        <td class="lignes text-right">
          {{$resultat->valeur}}
        </td>
        <td class="lignes">
          @lang($resultat->anaitem->unite->nom)
        </td>
      </tr>

    @endif

  @endforeach

@endif

<tr>
  <td colspan="3">
    <p class="lignes"><span class="font-italic">@lang('demandes.non_detecte') </span>

      @foreach ($prelevement->nonDetecte as $nondetecte)

        @if ($loop->first)

          {{ucfirst($nondetecte->anaitem->nom)}},

        @elseif ($loop->last)

          {{$nondetecte->anaitem->nom}}.

        @else

          {{$nondetecte->anaitem->nom}},

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
    @lang('demandes.signe_le') {{ \Carbon\Carbon::parse($demande->date_signature)->isoFormat('DD/MM/Y') }} par {{ $demande->labo->user->name }}
  </p>
  <img width="250px" src="{!! 'storage/img/labo/signatures/'.$demande->labo->signature !!}" alt="signature">

</div>
