<div class="row">

  <div class="col-md-10 mx-auto">

    <p class="lead pl-3 bg-bleu-tres-fonce text-white">@lang('form.prelevements')</p>

  </div>

</div>

<div class="row justify-content-center mb-3 d-flex align-items-end">

  <div class="col-md-10 bg-bleu-tres-clair pt-3 mx-auto">

    @include('labo.demandeForm.inputTypePrelevement')

  </div>

</div>

@for ($i=1; $i < 100; $i++)

  @include('labo.demandeForm.demandeLignePrelevement', ['numero' => $i])

@endfor
