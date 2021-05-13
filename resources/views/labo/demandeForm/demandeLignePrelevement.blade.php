{{-- issu de prelevementOndemande.blade.php --}}
<div id="lignePrelevement_{{ $i }}" class="lignePrelevement row justify-content-center">

  <div class="col-md-10 alert-bleu-tres-fonce pt-2">

    <h4>{{ ucfirst(__('form.prelev', ['num' => $i])) }}</h4>

  </div>

  <div class="col-md-10 py-3 border-left border-right">

    @include('labo.demandeForm.inputEtatPrelevement')

  </div>

  <div class="col-md-10 py-3 border-left border-right">

    @include('labo.demandeForm.inputTypePrelevement')

  </div>



  <div class="col-md-10 py-3 alert-bleu">

    @include('labo.demandeForm.inputIdentificationPrelevement')

  </div>

  <div class="col-md-10 mb-3 infos_prelevement border">

    @include('labo.demandeForm.infosPrelevement')



  </div>

</div>
