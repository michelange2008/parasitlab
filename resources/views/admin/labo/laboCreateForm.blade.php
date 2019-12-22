<!-- FRAGMENT DESTINE A CREER UN MEMBRE DE LABORATOIRE
NECESSITE  VARIABLES: user, -->

  {!! Form::open(['route' => 'laboAdmin.store', 'enctype' => 'multipart/form-data']) !!}

  <div id="userlabo_id">

  </div>

  @METHOD('POST')

  {{-- @include('admin.form.cache') --}}

  {{-- @include('admin.form.identite', ['create' => true]) --}}

  @include('admin.form.images')

  @include('admin.form.fonction')

  @include('fragments.boutonEnregistre')

  {!! Form::close() !!}
