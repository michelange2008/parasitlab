<!-- FRAGMENT DESTINE A CREER UN veto
NECESSITE 4 VARIABLES: user, pays -->

<form action="{{ route('vetoAdmin.store') }}" method="POST">
    @csrf

    <div id="userveto_id">

    </div>

    @include('admin.form.contact')

    @include('admin.form.inputCro')

    @include('fragments.boutonEnregistre')

</form>
