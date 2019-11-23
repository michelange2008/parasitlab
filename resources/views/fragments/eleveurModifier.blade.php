<!-- FRAGMENT DESTINE A MODIFIER UN ELEVEUR
NECESSITE 4 VARIABLES: user, vetos, pays, collapse
FONCTIONNE AVEC LE FRAGMENT titreUtilisateur-->

  <div class="collapse" id="{{ $collapse }}">
    <div class="card card-body">
      {!! Form::open(['route' => ['user.update', $user->id]], $user->id) !!}
      @METHOD('PUT')
      <input type="hidden" name="password" value="{{ $user->password }}">
      <input type="hidden" name="usertype_id" value="{{ $user->usertype->id }}">
        <div class="form-group">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="name">Nom:</label>
            <div class="col-sm-6">
              <input class="form-control" type="text" name="name" value="{{ $user->name }}">
            </div>
            <div class="col-sm-3">
              <input class="form-control" type="text" name="ede" value="{{ $user->eleveur->ede }}">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label" for="email">Adresse  mail</label>
          <div class="input-group col-sm-9">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input class="form-control" type="email" name="email" value="{{ $user->email}}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 col-form-label" for="address_1">Adresse</label>
          <div class="col-md-5">
            <input class="form-control" type="text" name="address_1" value="{{ $user->eleveur->address_1}}">
          </div>
          <div class="col-md-4 mt-md-0 mt-sm-3">
            <input class="form-control" type="text" name="address_2" value="{{ $user->eleveur->address_2}}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-3"></div>
          <div class="col-sm-4 col-md-3 col-lg-2">
            <input class="form-control" type="text" name="cp" value="{{ $user->eleveur->cp}}">
          </div>
          <div class="col-sm-8 col-md-6 col-lg-5">
            <input class="form-control" type="text" name="commune" value="{{ $user->eleveur->commune}}">
          </div>
          <div class="col-sm-6 col-md-3 col-lg-2">
            <select class="form-control" name="pays">
              <option value="France" selected>{{ $user->eleveur->pays }}</option>
              @foreach ($pays as $etat)
                <option value="{{ $etat }}">{{ $etat }}</option>
              @endforeach
          </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3" for="indicatif">Téléphone</label>
          <div class="input-group col-sm-3">
            <span class="input-group-text"><i class="material-icons">language</i></span>
            <input class="form-control" type="text" name="indicatif" value="{{ $user->eleveur->indicatif}}">
          </div>
          <div class="input-group col-sm-6">
            <span class="input-group-text" id="inputGroupPrepend"><i class="material-icons">phone</i></span>
            <input class="form-control" type="text" name="tel" value="{{ $user->eleveur->tel}}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3" for="veto">Vétérinaire</label>
          <div class="col-md-9">
            <select class="form-control" name="veto_id">
              <option value="{{$user->eleveur->veto->id}}">{{ $user->eleveur->  veto->user->name}}</option>
              @foreach ($vetos as $veto)
                <option value="{{ $veto->id}}">{{ $veto->user->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <input class="btn btn-bleu rounded-0" type="submit" name="" value="Enregistrer">
      {!! Form::close() !!}
    </div>
  </div>
