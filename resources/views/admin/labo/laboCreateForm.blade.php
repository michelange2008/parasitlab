<!-- FRAGMENT DESTINE A CREER UN MEMBRE DE LABORATOIRE
NECESSITE  VARIABLES: user, -->

  {!! Form::open(['route' => 'laboAdmin.store', 'enctype' => 'multipart/form-data']) !!}

  <div id="userlabo_id">

  </div>

  @METHOD('POST')

  @include('admin.form.images')

  @include('admin.form.inputFonction')

  @include('fragments.boutonEnregistre')

  {!! Form::close() !!}
