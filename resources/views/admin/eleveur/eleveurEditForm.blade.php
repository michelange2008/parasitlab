<!-- FRAGMENT DESTINE A MODIFIER UN ELEVEUR
NECESSITE 4 VARIABLES: user, vetos, pays -->


  {!! Form::open(['route' => ['user.update', $user->id]], $user->id) !!}

  @METHOD('PUT')

    @include('admin.form.cache')

    @include('admin.form.identite')

    @include('admin.form.contact', ['personne' => $user->eleveur])

    @include('admin.form.infosEleveur')

    @enregistreAnnule()

  {!! Form::close() !!}
