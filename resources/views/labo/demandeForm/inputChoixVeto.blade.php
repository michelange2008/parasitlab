{{-- Ne s'affiche que si le bouton ci-dessus est sur ON--}}
<div id="choixDuVeto">

  <!-- CHOIX DU VETO -->
  <div class="my-2 form-row">

    <div class="input-group">

      <span class="input-group-text"><i class="material-icons">local_hospital</i></span>

      <select class="form-control" name="veto_id">

        <option value="0">Nouveau vétérinaire</option>

        @isset($user->eleveur->veto->id)

          <option value="{{$user->eleveur->veto->id}}">{{ $user->eleveur->  veto->user->name}}</option>

        @endisset

        @foreach ($vetos as $veto)

          <option value="{{ $veto->id}}">{{ $veto->user->name }}</option>

        @endforeach

      </select>

    </div>

  </div>

</div>
{{-- Ne s'affiche que si le bouton ci-dessus est sur OFF--}}
  <div id="iconeVeto">

    @include('fragments.image', ['image' => "veto.svg", "class" => "img-90"])

</div>
