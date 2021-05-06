{{-- Fenêtre modale qui s'ouvre quand on crée des prélèvements et que l'on $
clique sur prelevement avec animaux idéntifiés
Cette vue est incluse dans inputTypePrelevement.blade.php --}}

<div class="modal fade" id="melange_avec_animaux" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

  <div class="modal-dialog modal-xl">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="staticBackdropLabel">@lang('titres.melange_create')</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        {{-- La balise ci-dessous ne sert à rien sauf à permettre que la balise
        form de ligne du dessous soit prise en compte: est-ce un bug de Bootstrap ?
        Je n'ai pas trouvé d'explication sur le net --}}
        <form></form>

        @include('labo.melanges.melangeAddAnimal')

        @include('labo.melanges.melangeCreateListeAnimaux')

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-bleu">@lang('boutons.save')</button>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('boutons.fermer')</button>

      </div>

    </div>

  </div>

</div>
