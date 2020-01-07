<div class="collapse @if(!$demande->acheve) show @endif " id="demande" aria-expanded="true">
  <div class="card card-body">

<!-- AFFICHAGE DES SYNTHESES: ANALYSE ET FACTURE-->
    <div class="row my-1">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5>{{ ucfirst($demande->anapack->nom) }}</h5>
          </div>
          @if ($demande->anapack->serie)
          <div class="card-body">
              <h5>
                <small>Cette analyse fait partie de la série </small>
                @nomLien([
                  'nom' => $demande->serie_id,
                  'id' => $demande->serie_id,
                  'route' => 'serie.show',
                  'tooltip' => "Cliquer pour afficher la série",
                ])
              </h5>
          </div>
        @endif
        </div>

      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h6>Informations</h6>
          </div>
          <div class="card-body">
            <strong>{{ $demande->informations }}</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="row my-3">

<!-- AFFICHAGE DES DONNEES ANALYSE -->
      <div class="col-md-6">

    <!-- TITRE ANALYSE-->
        <div class="row mx-1">

          <div class="col-md-12 alert-bleu-tres-fonce pt-3 d-inline-flex justify-content-around">

            @include('labo.demandeShow.syntheseTitre', ['titre' => 'analyse', 'route' => '#'])

          </div>

        </div>
    <!-- DETAIL ANALYSE-->
        <div class="row mx-1 border">

          @include('labo.demandeShow.syntheseAnalyse', ['demande' => $demande])

        </div>

      </div>

<!-- AFFICHAGE DES DONNEES FACTURE-->
      <div class="col-md-6">

    <!-- TITRE FACTURE-->
        <div class="row mx-1">

          <div class="col-md-12 alert-bleu-tres-fonce pt-3 d-inline-flex justify-content-around">

            @include('labo.demandeShow.syntheseTitre', ['titre' => 'facture', 'route' => '#'])

          </div>

        </div>

    <!-- DETAIL FACTURE-->
        <div class="row mx-1 border">

          <div class="col-md-12">

            @include('labo.demandeShow.syntheseFacture', ['demande' => $demande])

          </div>

        </div>

      </div>

    </div>

<!-- LIENS POUR RENVOYER ANALYSE ET FACTURE-->
    <div class="row my-3">

      <div class="col-md-6">

        @include('labo.demandeShow.syntheseRenvoiAnalyse', ['demande' => $demande, 'route' => "#"])

      </div>

      <div class="col-md-6">

        @include('labo.demandeShow.syntheseRenvoiFacture', ['demande' => $demande, 'route' => "#"])

      </div>

    </div>

</div>


</div>
