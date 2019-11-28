<div class="" id="{{ $collapse }}">
  <div class="card card-body">
    <div class="row">
      <div class="col-md-12 d-inline-flex d-flex justify-content-between">
        <img class="img-50" src="{{ asset('/storage/img/icones/')."/".$demande->espece->icone->nom }}" alt="espece">
        <h3 class="card-title">
          <a class=" color-rouge-tres-fonce" href="{{ route('eleveurAdmin.show', $demande->user->id) }}">
            <strong>{{ $demande->user->name }}</strong>
          </a>
        </h3>
        <h5>
          ({{ $demande->user->eleveur->tel}})
        </h5>
      </div>
    </div>
<!-- AFFICHAGE DES SYNTHESES: ANALYSE ET FACTURE-->
    <div class="row my-3">
<!-- AFFICHAGE DES DONNEES ANALYSE -->
      <div class="col-md-6">

    <!-- TITRE ANALYSE-->
        <div class="row mx-1">
          <div class="col-md-12 alert-bleu-tres-fonce pt-3 d-inline-flex justify-content-around">

            @include('fragments.syntheseTitre', ['titre' => 'analyse', 'route' => '#'])

          </div>
        </div>
    <!-- DETAIL ANALYSE-->
        <div class="row mx-1 border">

          @include('fragments.syntheseAnalyse', ['demande' => $demande])

        </div>

      </div>

<!-- AFFICHAGE DES DONNEES FACTURE-->
      <div class="col-md-6">

    <!-- TITRE FACTURE-->
        <div class="row mx-1">

          <div class="col-md-12 alert-bleu-tres-fonce pt-3 d-inline-flex justify-content-around">

            @include('fragments.syntheseTitre', ['titre' => 'facture', 'route' => '#'])

          </div>

        </div>

    <!-- DETAIL FACTURE-->    
        <div class="row mx-1 border">

          <div class="col-md-12">

            @include('fragments.syntheseFacture', ['demande' => $demande])

          </div>

        </div>

      </div>

    </div>

<!-- LIENS POUR RENVOYER ANALYSE ET FACTURE-->
    <div class="row my-3 border">

      <div class="col-md-6">

        @include('fragments.syntheseRenvoiAnalyse', ['demande' => $demande, 'route' => "#"])

      </div>

      <div class="col-md-6">

        @include('fragments.syntheseRenvoiFacture', ['demande' => $demande, 'route' => "#"])

      </div>

    </div>

</div>


</div>
