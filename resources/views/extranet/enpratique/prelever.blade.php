<div class="col-md-12 py-3">

  <h4 class="p-3 alert-bleu-tres-fonce">Toutes les questions sur les prélèvements: pourquoi, qui, quand, comment, ...</h4>

</div>

<div class="col-md-12 py-3">

  @include('extranet.enpratique.prelever.terre_lot')

</div>

<div class="col-md-12 py-3">
  <hr class="divider">
  <h4 class="color-bleu-tres-fonce">
    Ensuite tout depend du motif de votre analyse:
  </h4>

</div>

<div class="col-md-12 py-3">

  @foreach ($enpratiquePrelever as $element)

    <div class="media border p-3 mb-2  bg-bleu-tres-clair">
      <img class="mr-3" src="{!! asset('storage/img/icones').'/'.$element->icone !!}" alt="Problème">
      <div class="media-body">
        <h3 class="mt-0">
          {{ $element->titre }}
        </h3>
        <p class="lead">{{ $element->soustitre }}</p>
        <div class="d-flex flex-row">

          <div class="col-6 border-left">

            <p class="lead"><i class="far fa-hand-point-right"></i> Qui prélever&nbsp? </p>

            @foreach ($element->qui as $qui)

              <p>{{ $qui }}</p>

            @endforeach

          </div>

          <div class="col-6 border-left">

            <p class="lead"><i class="far fa-calendar-alt"></i> Quand prélever&nbsp? </p>

            @foreach ($element->quand as $quand)

              <p>{{ $quand }}</p>

            @endforeach

          </div>
        </div>
      </div>
    </div>

  @endforeach

</div>
