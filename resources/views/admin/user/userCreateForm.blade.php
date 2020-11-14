{!! Form::open(['route' => 'user.store', 'id' => 'userCreateForm']) !!}

<div class="row">

  <div class="col-md-12">

    @if (session()->has('creation.usertype'))

      @include('admin.form.inputUsertypeCache', ['usertype' => session('creation.usertype')])

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

    @enregistreAnnule(['nomBouton' => __('boutons.continuer')])

  </div>

</div>


{!! Form::close() !!}
