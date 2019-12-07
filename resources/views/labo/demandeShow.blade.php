<!-- INFORMATIONS SUR L'ANALYSE-->
@include('labo.demandeShow.titreDemande')

<!-- TITRE POUR CLIQUER ET EXPANDRE SI L'ANALYSE EST TERMINEE - NE S'AFFICHE PAS SI L'ANALYSE N'EST PAS TERMINÉE-->
@if ($demande->analyse)

  @include('fragments.titreCollapse', [
    'titre' => "Informations sur l'analyse",
    'icone' => 'info_blanc.svg',
    'tooltip' => "Cliquer pour voir les informations sur la demande d'analyse et la modifier",
    'collapse' => "demande",
    'detail' => true,
  ])

@endif

<!-- INFORMATIONS SUR L ANALYSE: SI TERMINEE NE S'AFFICHE PAS PAR DEFAUT - SINON AFFICHEE-->
  @include('labo.demandeShow.demandeDetail', [
    'demande' => $demande,
    'collapse' => 'demande',
  ])
<!-- DETAIL DE L ANALYSE DE CHAQUE PRELEVEMENT -->
@if ($demande->acheve)

  @include('labo.resultatsAnalyse')

@endif
