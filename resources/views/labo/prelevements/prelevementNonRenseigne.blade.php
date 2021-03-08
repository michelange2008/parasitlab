{{-- Prélèvement non encore renseignés --}}
{{-- Un prélèvement non renseigné est un prélèvement ajouté sans information.
il n'est pas présent dans la table prélèvements et apparait seulement parce que le nombre
de prélèvements déclarés dans la demande est supérieur au nombre de prélèvements présents
pour cette demande dans la table prélèvement--}}

  @if ($demande->nb_prelevement > $demande->prelevements->count())

    @for ($nb_prelevement = $demande->prelevements->count() + 1; $nb_prelevement <= $demande->nb_prelevement; $nb_prelevement++)

      <div class="my-3">


          @include('labo.resultats.titreResultat', [
            'nouveau' => true,
            'titre' => 'Prélèvement n° '.$nb_prelevement,
            'soustitre' => 'Informations non renseignées',
            'rang' => $nb_prelevement,
          ])

        </div>

    @endfor

  @endif
