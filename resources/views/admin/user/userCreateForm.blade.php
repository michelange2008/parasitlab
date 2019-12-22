{!! Form::open(['route' => 'user.store', 'id' => 'userCreateForm']) !!}

<div class="row">

  <div class="col-md-12">

    @if (session()->has('usertype'))

      @include('admin.form.inputUsertypeCache', ['usertype' => session('usertype')])

    @else

      @include('admin.form.inputUsertype')

    @endif


  </div>

</div>

<div class="row">

  <div class="col-md-12">

    @include('admin.form.identite')

  </div>

</div>

<div id="enregistreAnnule" class="row  my-3 justify-content-center">

  <div class="col-md-12">

    @include('fragments.blocEnregistreAnnule', ['nomBouton' => 'Continuer', 'route' => 'laboratoire'])

  </div>

</div>


{!! Form::close() !!}
