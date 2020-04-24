<!-- INFORMATIONS SUR L'ANALYSE-->
<div id="demande" class="card" acheve="{{ $demande->acheve }}" signe="{{ $demande->signe }}" envoye="{{ $demande->envoye }}" >

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
      'collapse' => "demande_detail",
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

  <div id="affiche_pdf" class="m-2" style="display:none">

      @bouton([
        'type' => 'route',
        'route' => 'resultatPdf',
        'id' => $demande->id,
        'couleur' => "btn-rouge",
        'fa' => 'fas fa-file-pdf',
        'intitule' => __('boutons.show_pdf'),
        'target' => '_blank',
      ])

  </div>

</div>
