{{-- Ne s'affiche que si le bouton ci-dessus est sur ON--}}
<div id="choixDuVeto">

  <!-- CHOIX DU VETO -->
  <div class="my-2 form-row">

    <label class="" for="veto_id">@lang('form.envoi_result_veto')</label>

    <div class="input-group">

      <select class="form-control" name="tovetouser_id">

        @if (Session::has('creation.user_eleveur'))

          @isset(session('creation.user_eleveur')->eleveur->veto->id)

            <option value="{{ session('creation.user_eleveur')->eleveur->veto->user->id }}">{{ session('creation.user_eleveur')->eleveur->veto->user->name }}</option>

          @endisset
        {{-- Dans le cas où on modifie la demande --}}
        @elseif (Session::has('creation.demande_modif'))
          {{-- Et qu'un véto est déjà associé à cette demande --}}
          @if($demande->tovetouser_id != null)
            {{-- on le met en premier --}}
            <option value="{{ $demande->tovetouser_id}}">{{ $demande->tovetouser->name }}</option>

          @endif
        {{-- SI c'est dans le cadre de la création d'un nouveau véto --}}
        @elseif (Session::has('creation.nouveau_veto.id'))
          {{-- on met le véto qui vient d'être créé --}}
          <option value="{{ session('creation.nouveau_veto.id') }}">{{ session('creation.nouveau_veto.name') }}</option>

        @endif
        {{-- sinon on met aucun véto --}}
        <option value="0">@lang('form.no_vet')</option>
        {{-- et toute la liste des vétos disponibles --}}
        @foreach ($vetos as $veto)

          <option value="{{ $veto->user->id }}">{{ $veto->user->name }}</option>

        @endforeach

      </select>

      <a id="createVeto" class="btn btn-secondary mx-3" href="{{ route('vetoAdmin.createOnDemande') }}"

      data-toggle="tooltip" data-placement="top" title="@lang('tooltips.add_new_vet')">

      <i class="fas fa-user-plus"></i>

    </a>

  </div>

</div>

</div>
