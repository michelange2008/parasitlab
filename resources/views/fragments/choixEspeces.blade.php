{{-- Boite de dialogue pour choisir l'espece et télécharger un formulaire--}}
<div id="choix" class="choix-especes" style="display:none;">
  {{-- stockage de l'adresse générique des formulaires pdf --}}
  <div id="pdf_generique" class="d-none">{{ url('storage/') }}</div>

    <div class="card">

      <div class="card-header">

        <h3>

          <img class="mr-3 mt-1" src="{{ url('storage/img/icones/especes.svg') }}" alt="">

          @lang('menuExtranet.teleForm')

        </h3>
        <h5 class="text-center">@lang('menuExtranet.clicEspece')</h5>


      </div>

      <div id="card-especes" class="card-body d-flex justify-content-around">
        {{-- ZONE POUR INSERER LES ICONES DES ESPECES --}}
      </div>

      <div class="card-footer">

        <button id="choix_annule" class="btn btn-secondary" type="button" name="button">@lang('boutons.annule')</button>

      </div>

  </div>

</div>
