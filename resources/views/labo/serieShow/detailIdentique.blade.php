  <ul class="list-group list-group-horizontal-md">
    <li class="list-group-item">Dans cette série, tous les lots sont identiques</li>
    <li class="list-group-item">Il y a {{ $serie->demandes[0]->prelevements->count()}} lots à chaque fois (
      @foreach ($serie->demandes[0]->prelevements as $prelevement)
        @if ($loop->first)
           {{ $prelevement->identification }}
        @elseif ($loop->last)
          et {{ $prelevement->identification }}
        @else
          , {{ $prelevement->identification }}
        @endif
      @endforeach
      )</li>
  </ul>

<table class="my-3 table table-hover table-bordered">
  <thead>
    <tr>
      @foreach ($titres as $titre)
        @if ($titre == $titre[0])
          <th>{{ $titre }}</th>
        @else
          <th class="text-center">{{ $titre }}</th>
        @endif
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach ($valeurs as $valeur)
      <tr>
        @foreach ($valeur as $value)
          @if ($valeur[1] === "")
            <td class="bg-bleu text-white"><strong>{{ $value }}</strong></td>
          @else
            @if ($value !== $valeur[0])
              <td class="text-center">{{ $value }}</td>
            @else
              <td>{{ $value }}</td>
            @endif
          @endif
        @endforeach
      </tr>
    @endforeach

  </tbody>
  </table>
