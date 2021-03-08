<p class="my-3 demande-titre">{{ mb_strtoupper($demande->anaacte->nom) }}</p>


<table class="table table-bordered table-sm">
  <tbody>
    <tr>
      <td style="width:300px">
        <span class="font-italic">Espece : </span><strong>{{ ucfirst($demande->espece->nom) }}</strong>

      </td>
      <td>
        <span class="font-italic">Date de prélèvement : </span><strong>{{ $demande->date_prelevement }}</strong>
      </td>
    </tr>
    <tr>
      <td>{{ ucfirst($demande->anaacte->anatype->nom) }}</td>
      <td>{{ $demande->anaacte->nom }}</td>
    </tr>

    <tr>
      <td style="line-height:100%" colspan="2" class="my-2">
        <p class="font-italic">Informations</p>
        {{ $demande->informations }}
      </td>
    </tr>
    @if ($demande->toveto)
      <tr style="background:lightgrey">
        <td colspan="2">
          <span class="font-italic">Vétérinaire: </span><strong>{{ $demande->veto }}</strong>
        </td>
      </tr>
    @endif

  </tbody>
</table>

<table class="table table-bordered table-sm">
  <thead class="alert-bleu-tres-fonce">
    <tr>
      <th colspan="2">Prélèvements</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($demande->prelevements as $prelevement)

      <tr>
        <td style="width:300px" class="font-weight-bold">Prélevement {!! $loop->index + 1 !!} :</td>
        <td class="font-weight-bold">{{ $prelevement->identification }}</td>
      </tr>

      <tr>
        <td class="ml-3"><i>Lot parasité&nbsp;:</i></td>
        <td>{{ ($prelevement->parasite == "saispas") ? "?" : (ucfirst($prelevement->parasite) ? __('commun.oui') : __('commun.non')) }}</td>
      </tr>

      <tr>
        <td class="ml-3 font-italic">Signes observés&nbsp;:</td>
        <td>
          @if (empty($prelevement['signes']))

            -

          @else

            @foreach ($prelevement['signes'] as $signe)

              @if ($loop->last)

                {{ $signe }}.

              @elseif ($loop->first)

                {{ ucfirst($signe) }},

              @else

                {{ $signe }},
              @endif

            @endforeach

          @endif
        </td>
      </tr>

    @endforeach

  </tbody>

</table>

<table>

  <tr>
    <td style="width:300px">Date:</td>
    <td>Signature:</td>
  </tr>

</table>
