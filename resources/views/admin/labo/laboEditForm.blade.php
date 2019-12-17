<!-- FRAGMENT DESTINE A MODIFIER UN ELEVEUR
NECESSITE 4 VARIABLES: user, -->


  {!! Form::open(['route' => ['user.update', $user->id], 'enctype' => 'multipart/form-data'], $user->id) !!}

  @METHOD('PUT')

    @include('admin.form.cache')

    @include('admin.form.cacheFile')

    @include('admin.form.identite')

    @include('admin.form.icone')

    @include('admin.form.inputFonction')

    @include('fragments.boutonEnregistre')

  {!! Form::close() !!}
