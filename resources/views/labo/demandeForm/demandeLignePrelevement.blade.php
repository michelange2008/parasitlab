<div id="lignePrelevement_{{ $i }}" class="lignePrelevement row justify-content-center d-none">


    <div class="col-md-5">

      @include('labo.demandeForm.inputIdentificationPrelevement')

    </div>

    <div class="col-md-5">

      @include('labo.demandeForm.inputEtatPrelevement')

    </div>


  <div class="col-md-10">

    @include('labo.demandeForm.infosPrelevement')

  </div>
{{-- remplacer consistance par autre chose --}}

  <div class="col-md-10 my-3 border-bottom"></div>

</div>
