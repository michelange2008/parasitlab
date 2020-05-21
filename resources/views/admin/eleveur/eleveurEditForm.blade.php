<!-- FRAGMENT DESTINE A MODIFIER UN ELEVEUR
NECESSITE 4 VARIABLES: user, vetos, pays -->


  {!! Form::open(['route' => ['user.update', $user->id]], $user->id) !!}

  @METHOD('PUT')

    <input type="hidden" name="usertype_id" value="{{ $user->usertype->id }}">

    @include('admin.form.identite')

    @include('admin.form.contact', ['personne' => $user->eleveur])

    @include('admin.form.infosEleveur')

    @enregistreAnnule()

  {!! Form::close() !!}
