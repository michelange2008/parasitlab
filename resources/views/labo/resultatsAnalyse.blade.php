@foreach ($demande->prelevements as $prelevement)
  <div class="row my-3 justify-content-center">
    <div class="col-md-12">
<!-- TITRE DETAIL CHAQUE PRELEVEMENT-->
      @include('fragments.titreCollapse', [
        'titre' => $prelevement->identification,
        'icone' => $demande->espece->icone->nom,
        'collapse' => 'prelevement'.$prelevement->id,
        'detail' => true,
      ])
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-12">
<!-- DETAIL CHAQUE PRELEVEMENT-->
      @include('fragments.analyseDetail', ['prelevement' => $prelevement, "collapse" => 'prelevement'.$prelevement->id])
    </div>
  </div>
@endforeach
