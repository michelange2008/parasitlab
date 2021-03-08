{{-- PARTIE PRINCIPALE DE LA DEMANDE: DEMANDEUR,ESPECE, PACK, DATES--}}

<div class="row">

  <div class="col-md-1 d-sm-none d-md-block offset-md-1">

    @image(['image' => 'veto.svg'])

  </div>

  <div class="col-md-5">

    @include('labo.demandeForm.inputChoixVeto')

  </div>

  <div class="col-md-10 offset-md-1">

    <hr class="divider">

  </div>

</div>

<div class="row justify-content-center">

    <div class="col-md-1 d-sm-none d-md-block">

      @image(['image' => 'nouveau.svg'])

    </div>

    <div class="col-md-4 border-right">

      {{-- CHOIX DE L'UTILISATEUR --}}
      @include('labo.demandeForm.inputDemandeur')

    </div>

    <div class="col-md-1 d-sm-none d-md-block">

      @image(['image' => 'analyse.svg'])

    </div>

    <div class="col-md-4">

      {{-- CHOIX DE L'ANALYSE --}}
      @include('labo.demandeForm.inputAnatype')

    </div>

</div>


<div class="row justify-content-center">

  <div class="col-md-1 d-sm-none d-md-block">

    @image(['image' => 'espece.svg'])

  </div>

  <div class="col-md-4 border-right">

    {{-- CHOIX DE L'ESPECE --}}
    @include('labo.demandeForm.inputEspece')

  </div>

  <div class="col-md-1"></div>

  <div class="col-md-4">

    @include('labo.demandeForm.inputAnaacte')
  </div>


{{-- BLOC QUI N EST PAS AFFICHE AU DEPARTS'affiche seulement si on choisit un anapack
qui crée une série (test de résistance par ex).
Dans ce cas, s'affiche un bloc permettant de préciser que c'est le premier de la série.
En plus, si un éleveur à une (ou plusieurs) série non terminée avec un anapack identique, ça affiche une nouvelle
ligne qui permet d'associer la nouvelle demande à cette série
--}}

</div>

<div class="row justify-content-center mt-2">

  <div class="col-md-1 d-sm-none d-md-block">

    @image(['image' => 'troupeau.svg'])

  </div>

  <div class="col-md-4 border-right">

    {{-- SAISIE DES DATES DE PRELEVEMENT (NON REQUIS) OU DE RECEPTION (REQUIS) --}}
    @include('labo.demandeForm.inputTroupeau')

  </div>

  <div class="col-md-5">

    <div id="estSerie" class="d-none">

      @include('labo.demandeForm.inputEstSerie')

    </div>

  </div>

</div>

<div class="row justify-content-center mt-2">

  <div class="col-md-1 d-sm-none d-md-block">

    @image(['image' => 'date.svg'])

  </div>

  <div class="col-md-4 border-right">

    {{-- SAISIE DES DATES DE PRELEVEMENT (NON REQUIS) OU DE RECEPTION (REQUIS) --}}
    @include('labo.demandeForm.inputDates')

  </div>

  <div class="col-md-1">

    @include('fragments.image', ['image' => 'prelevement.svg', 'class' => 'img-90'])

  </div>


  <div class="col-md-4">

    @include('labo.demandeForm.inputNbPrelevements')

  </div>

  <div class="col-md-10 my-3 border-bottom">

  </div>

</div>


  {{-- <div class="col-md-10 bg-bleu-tres-clair py-3 mx-auto mb-3">

    @include('labo.demandeForm.inputTypePrelevement')

  </div> --}}
