<div class="row justify-content-center my-3">

  <div class="col-md-10 bg-bleu-tres-clair p-3">
    <h2 class="lead text-left alert-bleu-tres-fonce  mb-3 p-2">
      <span class="spinner-grow text-bleu-tres-fonce" role="status"></span>
      Info du jour ({{ Carbon\Carbon::now()->isoFormat('MMMM Y') }})
    </h2>

    <div class="media">

      <img class="img-200" src="{{ url('storage/img/news/'.$new->img) }}" alt="">

      <div class="media-body text-left p-2">

        <h5 class="mt-0">
          {{ $new->title }}
        </h5>
        <p>
          {{ $new->content }}
        </p>
        <p><strong>
          {{ $new->conclusion }}
        </strong></p>
        <hr class="divider">

        @foreach ($newsBoutons as $bouton)

          @bouton([
            'type' => 'link',
            'lien' => 'express/'.$bouton->route,
            'fa' => "fas fa-".$bouton->fa,
            'intitule' => $bouton->texte,
            'couleur' => 'btn-secondary',
            'taille' => 'btn-sm',
            'target' => '_self',
          ])
        @endforeach

      </div>

    </div>

  </div>

</div>
