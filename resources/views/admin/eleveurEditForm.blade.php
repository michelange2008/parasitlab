<!-- FRAGMENT DESTINE A MODIFIER UN ELEVEUR
NECESSITE 4 VARIABLES: user, vetos, pays -->


  {!! Form::open(['route' => ['user.update', $user->id]], $user->id) !!}

  @METHOD('PUT')

  <input type="hidden" name="password" value="{{ $user->password }}">

  <input type="hidden" name="usertype_id" value="{{ $user->usertype->id }}">

  <div class="form-group">

    <div class="form-group row">

      <div class="col-sm-8">

        @include('admin.form.inputName')

      </div>

      <div class="col-sm-4">

        @include('admin.form.inputEde')

      </div>

    </div>

  </div>

  <div class="form-group row">

    <div class="col-sm-12">

      @include('admin.form.inputEmail')

    </div>

  </div>

  <div class="form-group row">

    <div class="col-sm-12">

      @include('admin.form.inputAdresse')

    </div>

  </div>

  <div class="form-group row">

    <div class="col-sm-12">

      @include('admin.form.inputTelephone')

    </div>

  </div>
  <div class="form-group row">

    <div class="col-sm-12">

      @include('admin.form.inputVeto')

    </div>

  </div>

  <input class="btn btn-bleu rounded-0" type="submit" name="" value="Enregistrer">

  {!! Form::close() !!}
