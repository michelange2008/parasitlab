<div class="row my-3">

  <div class="col-md-10 offset-md-1">

    @titre(['titre' => "Des résultats rapides", 'icone' => 'fast.svg'])

  </div>

</div>

<div class="row justify-content-start text-left">

  <div class="col-md-1"></div>

  @foreach ($resultats_rapides as $rp)

    <div class="col-md-5">

      <div class="card bg-light">

        <div class="card-header">

          <p class="lead card-title">
            <img src="{!! url('storage/img/icones/'.$rp->icone) !!}" style="width:50px" alt="">
            @lang($rp->prefixe.$rp->titre)</p>

          </div>

          <div class="card-body">

            <h5><strong>@lang($rp->prefixe.$rp->resultats)</strong></h5>
            <p>
              <span class="color-bleu-tres-fonce">
                @lang($rp->prefixe.$rp->texte_1)
                <strong>@lang($rp->prefixe.$rp->moment_arrivee)</strong>
                @lang('resultats_rapides.transmettre')
                @lang($rp->prefixe.$rp->moment_resultats)
              </span>
            </p>

          </div>

          <div class="card-footer">

            @bouton([
              'type' => 'route',
              'route' => $rp->route,
              'intitule' => __($rp->prefixe.$rp->intitule),
            ])

          </div>

        </div>

      </div>
  @endforeach

</div>
