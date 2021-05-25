{{-- technique d'analyse en fonction de la demande --}}
<h5>{{ ucfirst($demande->anaacte->anatype->technique )}}</h5>

<table>
  <tr>
    <td>
      {{-- nom de l'élevage --}}
      <p>@lang('form.nom'): <strong>{{ $demande->user->name }}</strong> ({{ $demande->espece->nom }})</p>
    </td>
    {{-- système boiteux pour faire un affichage colonne du pdf --}}
    <td style="visibility:hidden">---------------------</td>
    <td>
      <p>@lang('form.date_prelevement'): <strong>{{ date('j M Y', strtotime($demande->date_prelevement)) }}</strong></p>
    </td>
  </tr>
  <tr>
    <td>
      <p>{!! ucfirst(__('commun.obs')) !!}: _____________________</p>
    </td>
    <td style="visibility:hidden">---------------------</td>
    <td>
      <p>@lang('form.date_analyse'): ___________________</p>
    </td>
  </tr>
</table>
<br>
<table style="width:100%;border:solid 1px black;">
  <tr style=" background-color:lightgrey; text-align:center; border-bottom:solid 1px black">

    <td style="border-right:solid 0.5px black; text-align:left">@lang('commun.al_mel')</td>

    @foreach ($anaitems as $anaitem)

      @if ($loop->last)

        <td style="text-align:center">{{ $anaitem->abbreviation }}<br>{{ $anaitem->unite->nom }}</td>

      @else

        <td style="border-right:solid 0.5px black; text-align:center">{{ $anaitem->abbreviation }}<br>{{ $anaitem->unite->nom }}</td>

      @endif

    @endforeach

  </tr>

  @foreach ($prelevements as $prelevement)
    <tr style="border-bottom: solid 1px black; ">
      @include('labo.paillasse.identification')
      @foreach ($anaitems as $anaitem)
        @if ($loop->last)
          <td style="border-bottom: solid 1px black"></td>

        @else

          <td style="border-bottom: solid 1px black; border-right: solid 1px black"></td>

        @endif

      @endforeach

    </tr>

  @endforeach

  @include('labo.paillasse.piedTableau')
</table>
