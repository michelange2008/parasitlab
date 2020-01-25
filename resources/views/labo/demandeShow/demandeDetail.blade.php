<div class="collapse @if(!$demande->acheve) show @endif " id="demande" aria-expanded="true">
  <div class="card card-body">

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
