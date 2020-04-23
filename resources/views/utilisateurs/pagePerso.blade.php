<div class="bg-bleu-tres-fonce p-3 align-items-middle color-bleu-tres-clair">


  <img class="img-90 d-none ck d-lg-block img-claire" src="{!! url('storage/img/icones/'.auth()->user()->usertype->icone->nom) !!}" alt="">

  <h4 class="d-lg-block">@lang('eleveurs.pagePerso.titre')</h4>

  <p class="d-none d-lg-block">

    @lang('eleveurs.pagePerso.texte_1')

  </p>


  <p class="d-none d-lg-block">

    @lang('eleveurs.pagePerso.texte_2')

  </p>

  <p class="d-none d-lg-block">

    @lang('eleveurs.pagePerso.texte_3')
     <a href="{!! route('infos.contact') !!}"><i class="fas fa-comments"></i> <strong>@lang('commun.contact_us_short')</strong></a>

  </p>

  <p class="d-none d-lg-block text-right"><i>@lang('commun.signature')</i></p>
</div>
