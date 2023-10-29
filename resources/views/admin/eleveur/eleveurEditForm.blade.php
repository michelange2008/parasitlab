<!-- FRAGMENT DESTINE A MODIFIER UN ELEVEUR
NECESSITE 4 VARIABLES: user, vetos, pays -->


<form action="{{ route('user.update', $user->id) }}" method="POST">

    @csrf
    @method('PUT')

    <input type="hidden" name="usertype_id" value="{{ $user->usertype->id }}">

    @include('admin.form.identite')

    @include('admin.form.contact', ['personne' => $user->eleveur])

    @include('admin.form.infosEleveur')

    @enregistreAnnule(['route' => route('eleveurAdmin.show', $user->id)])

</form>
