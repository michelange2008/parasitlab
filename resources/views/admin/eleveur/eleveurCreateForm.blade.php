<!-- FRAGMENT DESTINE A CREER UN ELEVEUR
NECESSITE 4 VARIABLES: user, vetos, pays -->

<form action="{{ route('eleveurAdmin.store') }}" method="POST">
    @csrf

    <div id="usereleveur_id">

    </div>

    @include('admin.form.contact')

    @include('admin.form.infosEleveur')

    @enregistreAnnule(['route' => 'user.index'])

</form>
