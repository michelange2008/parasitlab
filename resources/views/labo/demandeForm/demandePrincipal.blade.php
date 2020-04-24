{{-- PARTIE PRINCIPALE DE LA DEMANDE: DEMANDEUR,ESPECE, PACK, DATES--}}

<div class="row justify-content-center">

    <div class="col-md-1 d-sm-none d-md-block">

      @image(['image' => 'nouveau.svg'])

    </div>

    <div class="col-md-4 border-right">

      {{-- CHOIX DE L'UTILISATEUR --}}
      @include('labo.demandeForm.inputDemandeur')

    </div>

    <div class="col-md-1 d-sm-none d-md-block">

      @image(['image' => 'espece.svg'])

    </div>

    <div class="col-md-4">

      {{-- CHOIX DE L'ESPECE --}}
      @include('labo.demandeForm.inputEspece')
    </div>

</div>


<div class="row justify-content-center">

  <div class="col-md-1 d-sm-none d-md-block">

    @image(['image' => 'analyse.svg'])

  </div>

  <div class="col-md-4 border-right">

    {{-- CHOIX DE L'ANALYSE --}}
    @include('labo.demandeForm.inputTypeActe')

  </div>

  <div class="col-md-1 d-sm-none d-md-block">

    @image(['image' => 'date.svg'])

  </div>

  <div class="col-md-4">

    {{-- SAISIE DES DATES DE PRELEVEMENT (NON REQUIS) OU DE RECEPTION (REQUIS) --}}
    @include('labo.demandeForm.inputDates')

  </div>

{{-- BLOC QUI N EST PAS AFFICHE AU DEPARTS'affiche seulement si on choisit un anapack
qui crée une série (test de résistance par ex).
Dans ce cas, s'affiche un bloc permettant de préciser que c'est le premier de la série.
En plus, si un éleveur à une (ou plusieurs) série non terminée avec un anapack identique, ça affiche une nouvelle
ligne qui permet d'associer la nouvelle demande à cette série
--}}
  <div id="estSerie" class="col-md-10 d-none">

    @include('labo.demandeForm.inputEstSerie')

  </div>

  <div class="col-md-10 my-3 border-bottom">

  </div>

</div>
