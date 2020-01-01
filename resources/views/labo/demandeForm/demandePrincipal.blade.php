{{-- PARTIE PRINCIPALE DE LA DEMANDE: DEMANDEUR,ESPECE, PACK, DATES--}}

<div class="row justify-content-center">

    <div class="col-md-1 d-sm-none d-md-block">

      @include('fragments.image', ['image' => 'nouveau.svg'])

    </div>

    <div class="col-md-4 border-right">

      <!-- CHOIX DE L'UTILISATEUR -->
      @include('labo.demandeForm.inputDemandeur')

    </div>

    <div class="col-md-1 d-sm-none d-md-block">

      @include('fragments.image', ['image' => 'espece.svg'])

    </div>

    <div class="col-md-4">

      <!-- CHOIX DE L'ESPECE -->
      @include('labo.demandeForm.inputEspece')
    </div>

</div>


<div class="row justify-content-center">

  <div class="col-md-1 d-sm-none d-md-block">

    @include('fragments.image', ['image' => 'pack.svg'])

  </div>

  <div class="col-md-4 border-right">

    <!-- CHOIX DE L'ANALYSE -->
    @include('labo.demandeForm.inputPack')

  </div>

  <div class="col-md-1 d-sm-none d-md-block">

    @include('fragments.image', ['image' => 'date.svg'])

  </div>

  <div class="col-md-4">

    <!-- SAISIE DES DATES DE PRELEVEMENT (NON REQUIS) OU DE RECEPTION (REQUIS) -->
    @include('labo.demandeForm.inputDates')

  </div>

  <div class="col-md-10 my-3 border-bottom">

  </div>

</div>
