{{-- Ne s'affiche que si le bouton ci-dessus est sur ON--}}
<div id="choixDuVeto">

  <!-- CHOIX DU VETO -->
  <div class="my-2 form-row">

    <div class="input-group">
      <span class="input-group-text"><i class="fas fa-user-md"></i></span>

      <select class="form-control" name="veto_id">

        @if (Session::has('user'))

          @isset(session('user')->eleveur->veto->id)

            <option value="{{session('user')->eleveur->veto->id}}">{{ session('user')->eleveur->veto->user->name}}</option>

          @endisset

        @endif

        <option value="0">@lang('form.new_vet')</option>

        @foreach ($vetos as $veto)

          <option value="{{ $veto->id}}">{{ $veto->name }}</option>

        @endforeach

      </select>

    </div>

  </div>

</div>
{{-- Ne s'affiche que si le bouton ci-dessus est sur OFF--}}
  <div id="iconeVeto">

    @include('fragments.image', ['image' => "veto.svg", "class" => "img-90"])

</div>
