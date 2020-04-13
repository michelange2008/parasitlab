<!-- FRAGMENT DESTINE A CREER UN ELEVEUR
NECESSITE 4 VARIABLES: user, vetos, pays -->

  {!! Form::open(['route' => 'eleveurAdmin.store']) !!}

  @METHOD('POST')

  <div id="usereleveur_id">

  </div>

    @include('admin.form.contact')

    @include('admin.form.infosEleveur')

    @include('fragments.blocEnregistreAnnule',['route' => 'user.index'])


  {!! Form::close() !!}
