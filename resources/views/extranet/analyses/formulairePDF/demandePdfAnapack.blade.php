<p class="my-3 demande-titre">{{ mb_strtoupper($demande->anapack->nom) }}</p>


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
        <td style="width:300px" class="font-italic">Prélevement {!! $loop->index + 1 !!} :</td>
        <td class="font-weight-bold">{{ $prelevement->identification }}</td>
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
