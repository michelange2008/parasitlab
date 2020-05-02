<div class="card card-body">

  <!-- AFFICHAGE DES DONNEES ANALYSE -->
  <!-- TITRE ANALYSE-->
  <h5 class="card-title alert-secondary p-3 ">@lang('demandes.analyse')</h5>

  <!-- DETAIL ANALYSE-->

  @include('labo.demandeShow.syntheseAnalyse', ['demande' => $demande])

  <!-- LIENS POUR RENVOYER ANALYSE ET FACTURE-->
  @include('labo.demandeShow.syntheseRenvoiAnalyse')


  <!-- AFFICHAGE DES DONNEES FACTURE-->

  <!-- TITRE FACTURE-->

  <h5 class="card-title p-3 alert-secondary">@lang('factures.facture')</h5>


  <!-- DETAIL FACTURE-->
  @include('labo.demandeShow.syntheseFacture', ['demande' => $demande])

  @include('labo.demandeShow.syntheseRenvoiFacture', ['route' => "#"])

</div>
