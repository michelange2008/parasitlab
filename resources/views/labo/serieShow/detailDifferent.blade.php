@foreach ($serie->demandes as $demande)

  <div class="row">

    <div class="card card-body mb-3">

      <div class="card-title alert alert-bleu-tres-fonce">
        <strong>@include('fragments.dateFr', ['date' => $demande->date_prelevement])</strong> - {{ ucfirst($demande->prelevements[0]->analyse->nom) }}

      </div>



  @foreach ($demande->prelevements as $prelevement)

    <div class="card-text">

      <div class="col-md-12">

        @include('labo.resultats.resultatsPositifs')

      </div>

    </div>

  @endforeach
</div>

</div>

@endforeach
