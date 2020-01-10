<!-- INFORMATIONS SUR L'ANALYSE-->
<div class="card">
  <div class="card-header">

    @include('labo.demandeShow.titreDemande')

    <a class="btn btn-lg btn-bleu rounded-0" href="{{ route('resultats.edit', $demande->id )}}">Saisie/Modification des résultats</a>

  </div>
<div class="card-body">

<!-- TITRE POUR CLIQUER ET EXPANDRE SI L'ANALYSE EST TERMINEE - NE S'AFFICHE PAS SI L'ANALYSE N'EST PAS TERMINÉE-->
@if ($demande->acheve)

  @include('fragments.titreCollapse', [
    'titre' => "Informations sur l'analyse",
    'icone' => 'info_blanc.svg',
    'tooltip' => "Cliquer pour voir les informations sur la demande d'analyse et la modifier",
    'collapse' => "demande",
    'detail' => true,
  ])

@endif

<!-- INFORMATIONS SUR L ANALYSE: SI TERMINEE NE S'AFFICHE PAS PAR DEFAUT - SINON AFFICHEE-->
@include('labo.demandeShow.demandeDetail')

<!-- DETAIL DE L ANALYSE DE CHAQUE PRELEVEMENT -->
@if ($demande->acheve)

  @include('labo.resultatsAnalyse')

@endif

</div>


</div>
