<div id="modal-infos" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modal-infos" aria-hidden="true">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header d-flex justify-content-start align-items-center">
        @lang('form.obs_modif')
      </div>

      <div class="modal-body">
        <form id="" class="observation_update" action="{{ route('observations.update', 1) }}">
          @method('PUT')
          @csrf
          <div class="form-group">
            <label for="intitule">@lang('form.intitule')</label>
            <div id="intitule-modal"></div>
          </div>
          <div class="form-group">
            <label for="explication">@lang('form.explication')</label>
            <div id="explication-modal"></div>
          </div>
          <div class="form-group">
            <label for="autres">@lang('form.autres_causes')</label>
            <div id="autres-modal"></div>
          </div>

          @include('admin.algorithme.inputCategorie')

          <div class="form-group">
            <label for="ordre">@lang('form.position_liste')</label>
            <div id="ordre-modal"></div>
          </div>
          <div class="my-3">
            @enregistreAnnule()
          </div>


        </form>
      </div>

    </div>

  </div>

</div>
