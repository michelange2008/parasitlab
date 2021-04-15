{{-- issu de prelevementOndemande.blade.php --}}
<div id="lignePrelevement_{{ $i }}" class="lignePrelevement row justify-content-center">

  <div class="col-md-10 alert-bleu-tres-fonce pt-2">

    <h4>{{ ucfirst(__('form.prelev', ['num' => $i])) }}</h4>

  </div>

  <div class="col-md-10 my-3">

    @include('labo.demandeForm.inputTypePrelevement')

  </div>



  <div class="col-md-5">

      @include('labo.demandeForm.inputIdentificationPrelevement')

    </div>

    <div class="col-md-5 etat_prelevement">

      @include('labo.demandeForm.inputEtatPrelevement')

    </div>


    <div class="col-md-10 infos_prelevement">

      @include('labo.demandeForm.infosPrelevement')

      <div class="col-md-10 my-3 border-bottom"></div>

    </div>

  </div>
