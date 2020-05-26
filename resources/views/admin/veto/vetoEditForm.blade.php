<!-- FRAGMENT DESTINE A MODIFIER UN VETERINAIRE
NECESSITE 2 VARIABLES: user, pays -->


  {!! Form::open(['route' => ['user.update', $user->id]], $user->id) !!}

  @METHOD('PUT')

    <input type="hidden" name="usertype_id" value="{{ $user->usertype->id }}">

    @include('admin.form.identite')

    @include('admin.form.contact', ['personne' => $user->veto])

    @include('admin.form.inputCro')

    @include('fragments.boutonEnregistre')

  {!! Form::close() !!}
