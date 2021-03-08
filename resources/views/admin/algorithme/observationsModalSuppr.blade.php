<div id="modal-suppr" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modal-infos" aria-hidden="true">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header alert-danger">

        <h5 class="modal-title" id="modal-supprObs-titre">@lang('algorithme.suppr_observation_warning')</h5>

      </div>

      <div class="modal-body">

        <div id="modal-detailObs"></div>

        <div id="modal-animalObs" >

          <h5 id="modal-animalObsTitreAvec" class="text-secondary" style="display:none">@lang('algorithme.animalObsTitreAvec')</h5>
          <p id="modal-listeAnimaux"></p>
          <h5 id="modal-animalObsTitreSans" style="display:none">@lang('algorithme.animalObsTitreSans')</h5>

        </div>

        <div id="modal-optionObs" >

          <h5 id="modal-optionsObsTitreAvec" class="text-secondary" style="display:none">@lang('algorithme.optionObsTitreAvec')</h5>
          <p id="modal-optionsObstexte"></p>
          <h5 id="modal-optionsObsTitreSans" style="display:none">@lang('algorithme.optionObsTitreSans')</h5>

        </div>
    </div>

    <div class="modal-footer alert-danger">

      <h5>@lang('algorithme.suppr_observation_question')</h5>

      <div class="">

        <form id="modal-form-suppr" action="{{ route('observations.destroy', 1) }}">

          @csrf
          @method('delete')
          @enregistreAnnule(['nomBouton' => __('boutons.del'), 'route' => route('observations.index')])

        </form>

      </div>

    </div>

    </div>

  </div>

</div>
