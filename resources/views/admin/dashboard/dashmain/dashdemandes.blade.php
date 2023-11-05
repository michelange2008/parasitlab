<div class="d-flex align-items-center bg-bleu-tres-clair p-2">
    <img class="img-40" src="{{ url('storage/img/icones').'/'.$icone }}" alt="">
    <h4 class="h4 mb-0 pl-1">@lang('dashboard.'.$titre)</h4>
</div>
@if ($demandes->count() == 0)
    <p class="p-3 font-italic text-secondary">@lang('dashboard.'.$aucune)</p>
@else
    <table class="table table-hover table-bordered">
        @foreach ($demandes as $demande)
            <tr>
                <td role="button">
                    <a href="{{ route('demandes.show', $demande->id) }}">
                        <div class="d-flex">
                            <div>
                                <img class="img-40"
                                    src="{{ url('storage/img/icones/' . $demande->espece->icone->nom) }}"
                                    alt="">
                            </div>
                            <div class="pl-2">
                                <p class="mb-0">{{ $demande->user->name }}</p>
                                <p class="mb-0 color-bleu">
                                    {{ ucfirst($demande->anaacte->anatype->nom) }}
                                </p>
                            </div>
                        </div>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endif
