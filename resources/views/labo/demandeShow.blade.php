<!-- INFORMATIONS SUR L'ANALYSE-->
<div class="card">
  <div class="card-header">

    @include('labo.demandeShow.titreDemande')

    <div class="btn-group" role="group" aria-label="modif-signature-envoi">

      <a class="btn btn-lg btn-bleu" href="{{ route('resultats.edit', $demande->id )}}">@lang('boutons.saisie_modif_result')</a>

      @if ($demande->acheve)

        @include('labo.demandeShow.signature')

        @include('labo.demandeShow.envoi')

      @endif

    </div>

  </div>

  <div class="card-body">

  <!-- TITRE POUR CLIQUER ET EXPANDRE SI L'ANALYSE EST TERMINEE - NE S'AFFICHE PAS SI L'ANALYSE N'EST PAS TERMINÉE-->
  @if ($demande->acheve)

    @include('fragments.titreCollapse', [
      'titre' => __('demandes.analyse_infos'),
      'icone' => 'info_blanc.svg',
      'tooltip' => __('tooltips.affiche_detail_demande'),
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
