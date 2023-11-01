<!-- FRAGMENT DESTINE A CREER UN MEMBRE DE LABORATOIRE
NECESSITE  VARIABLES: user, -->

  <form action="{{ route('laboAdmin.store') }}" method="POST" enctype="multipart/form-data">
    
    @csrf
    
    <div id="userlabo_id">

    </div>
    
    {{-- @METHOD('POST') --}}
    
    @include('admin.form.images')
    
    @include('admin.form.inputFonction')
    
    @include('fragments.boutonEnregistre')
    
  </form>
