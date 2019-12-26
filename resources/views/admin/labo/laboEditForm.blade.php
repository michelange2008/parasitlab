<!-- FRAGMENT DESTINE A MODIFIER UN MEMBRE DU LABORATOIRE
NECESSITE 4 VARIABLES: user, -->


  {!! Form::open(['route' => ['user.update', $user->id], 'enctype' => 'multipart/form-data'], $user->id) !!}

  @METHOD('PUT')

    @include('admin.form.cache')

    @include('admin.form.identite')

    @include('admin.form.images')

    @include('admin.form.fonction')

    @include('fragments.boutonEnregistre')

    @include('fragments.boutonAnnule')

  {!! Form::close() !!}
