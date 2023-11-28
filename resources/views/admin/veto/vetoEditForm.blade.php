<!-- FRAGMENT DESTINE A MODIFIER UN VETERINAIRE
NECESSITE 2 VARIABLES: user, pays -->


  <form action="{{ route('user.update', $user->id) }}" method="POST">

    @method('PUT')
    @csrf

    <input type="hidden" name="usertype_id" value="{{ $user->usertype->id }}">

    @include('admin.form.identite')
    
    @include('admin.form.contact', ['personne' => $user->veto])
    
    @include('admin.form.inputCro')
    
    @include('fragments.boutonEnregistre')

  </form>
