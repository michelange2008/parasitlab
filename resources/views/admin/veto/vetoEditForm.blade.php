<!-- FRAGMENT DESTINE A MODIFIER UN VETERINAIRE
NECESSITE 2 VARIABLES: user, pays -->


  {!! Form::open(['route' => ['user.update', $user->id]], $user->id) !!}

  @METHOD('PUT')

    @include('admin.form.cache')

    @include('admin.form.identite')

    @include('admin.form.contact', ['personne' => $user->veto])

    @include('admin.form.inputCro')

    @include('fragments.boutonEnregistre')

  {!! Form::close() !!}
