@foreach ($estParasite as $reponse)

  <div class="custom-control custom-radio custom-control-inline">

    <input type="radio" id="{{ $reponse->id }}_{{ $i }}"

            name="{{ $reponse->groupe }}_{{ $i }}"

            class="custom-control-input"

            value="{{ $reponse->id }}"
            {{-- Si on modifier un prélèvement, il faut mettre son état parasite --}}
            @if(isset($prelevement))

                @if ($reponse->id === $prelevement->parasite)

                  checked="checked"

                @endif
            {{-- Sinon on met l'état par défaut à "ne sais pas" cad null --}}
            @elseif ($reponse->id === null)

              checked="checked"

            @endif

        >

    <label class="custom-control-label" for="{{ $reponse->id }}_{{ $i }}">{!! ucfirst(__($reponse->texte)) !!}</label>

  </div>

@endforeach
