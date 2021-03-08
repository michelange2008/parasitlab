{{-- Issu de prelever.blade.php --}}
@foreach ($qui_quand->contenu as $element) {{-- on boucle sur le json qui_quand.json qui renvoie au fichier de langue qui_quand.php --}}

  <div class="media border p-3 mb-2  bg-bleu-tres-clair">
    <img class="mr-3 d-none d-md-block" src="{!! url('storage/img/icones/'.$element.'svg') !!}" alt="{{ $element }}">
    <div class="media-body">
      <h3 class="mt-0">
        @lang($qui_quand->prefixe.$element.'titre')
      </h3>
      <p class="lead">@lang($qui_quand->prefixe.$element.'soustitre')</p>

      <div class="d-md-flex flex-row">


          <div class="col-md-6 border-left">

            <p class="lead"><i class="fas fa-hand-point-right"></i> @lang($qui_quand->prefixe.'qui_prelever')</p>

              <p>@lang($qui_quand->prefixe.$element."qui")</p>

          </div>


          <div class="col-md-6 border-left">

            <p class="lead"><i class="fas fa-calendar-alt"></i> @lang($qui_quand->prefixe.'quand_prelever')</p>

              <p>@lang($qui_quand->prefixe.$element."quand")</p>

          </div>

      </div>

    </div>

  </div>

@endforeach
{{-- dernière ligne qui rappelle de demander au véto --}}
<div class="media border p-3 mb-2  bg-rouge-clair">
  <img class="mr-3 d-none d-md-block" src="{!! 'storage/img/icones/veto.svg' !!}" alt="veto.svg">
  <div class="media-body">
    <h3 class="mt-0">
      @lang($qui_quand->prefixe.'veto.titre')
    </h3>
    <p class="lead">@lang($qui_quand->prefixe.'veto.soustitre')</p>

  </div>

</div>
