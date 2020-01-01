<div class="row">

  <div class="col-md-10 mx-auto">

    <p class="lead pl-3 bg-bleu-tres-fonce text-white">Prélèvements</p>

  </div>

</div>

<div class="row justify-content-center mb-3 d-flex align-items-end">

  <div class="col-md-1">

    @include('fragments.image', ['image' => 'prelevement.svg'])

  </div>

  <div class="col-md-9">

    @include('labo.demandeForm.inputNbPrelevements')

  </div>

</div>

@for ($i=1; $i < 16; $i++)

  @include('labo.demandeForm.demandeLignePrelevement', ['numero' => $i])

@endfor
