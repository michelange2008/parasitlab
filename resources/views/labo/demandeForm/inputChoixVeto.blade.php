{{-- Ne s'affiche que si le bouton ci-dessus est sur ON--}}
<div id="choixDuVeto">

  <!-- CHOIX DU VETO -->
  <div class="my-2 form-row">

    <label class="" for="veto_id">@lang('form.envoi_result_veto')</label>

    <div class="input-group">

      <select class="form-control" name="veto_id">

        @if (Session::has('creation.user_eleveur'))

          @isset(session('creation.user_eleveur')->eleveur->veto->id)

            <option value="{{ session('creation.user_eleveur')->eleveur->veto->id }}">{{ session('creation.user_eleveur')->eleveur->veto->user->name }}</option>

          @endisset

        @elseif (Session::has('creation.nouveau_veto.id'))

            <option value="{{ session('creation.nouveau_veto.id') }}">{{ session('creation.nouveau_veto.name') }}</option>

        @endif

        <option value="0">@lang('form.no_vet')</option>

        @foreach ($vetos as $veto)

          <option value="{{ $veto->id }}">{{ $veto->name }}</option>

        @endforeach

      </select>

      <a id="createVeto" class="btn btn-secondary mx-3" href="{{ route('vetoAdmin.createOnDemande') }}"

        data-toggle="tooltip" data-placement="top" title="@lang('tooltips.add_new_vet')">

        <i class="fas fa-user-plus"></i>

      </a>

    </div>

  </div>

</div>
