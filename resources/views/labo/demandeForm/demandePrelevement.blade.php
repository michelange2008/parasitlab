<div class="row">

  <div class="col-md-10 mx-auto">

    <p class="lead pl-3 bg-bleu-tres-fonce text-white">@lang('form.prelevements')</p>

  </div>

</div>



@for ($i=1; $i < 100; $i++)

  @include('labo.demandeForm.demandeLignePrelevement', ['numero' => $i])

@endfor
