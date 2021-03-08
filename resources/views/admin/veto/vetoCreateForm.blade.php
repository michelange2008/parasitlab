<!-- FRAGMENT DESTINE A CREER UN veto
NECESSITE 4 VARIABLES: user, pays -->

  {!! Form::open(['route' => 'vetoAdmin.store']) !!}

  @METHOD('POST')

  <div id="userveto_id">

  </div>

    @include('admin.form.contact')

    @include('admin.form.inputCro')

    @include('fragments.boutonEnregistre')

  {!! Form::close() !!}
