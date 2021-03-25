<div class="card card-body">

  <!-- AFFICHAGE DES DONNEES ANALYSE -->
  <!-- TITRE ANALYSE-->
  <h5 class="card-title d-flex alert-secondary px-3 py-1 justify-content-between align-items-center">

    <div class="">

      @if (Auth::user()->usertype->route == 'laboratoire')

          <a href="{{ route('paillasse', $demande->id)}}" title="Télécharger la fiche de paillasse" target="blank">
            <img class="img-40" src="{{ url('storage/img/icones/paillasse.svg') }}" alt="paillasse">
          </a>

      @endif

      @lang('demandes.analyse')

    </div>

    @include('labo.demandeShow.etatSaisie')

  </h5>

  <!-- DETAIL ANALYSE-->

  @include('labo.demandeShow.syntheseAnalyse')

  @if ($demande->acheve)

    @include('labo.resultats.commentaire')

  @endif

  <!-- LIENS POUR RENVOYER ANALYSE ET FACTURE-->
  @include('labo.demandeShow.syntheseRenvoiAnalyse')


  <hr class="divider">
  <!-- AFFICHAGE DES DONNEES FACTURE-->

  <!-- TITRE FACTURE-->

  <h5 class="card-title p-3 alert-secondary">@lang('factures.facture')</h5>


  <!-- DETAIL FACTURE-->
  @include('labo.demandeShow.syntheseFacture')

  @include('labo.demandeShow.syntheseRenvoiFacture', ['route' => "#"])

  <div class="card-body">

    @if (!$demande->acheve)

      @bouton([
        'type' => 'route',
        'route' => 'demandes.modif',
        'id' => $demande->id,
        'fa' => "fas fa-edit",
        'intitule' => __('boutons.demandeModif'),
        'title' => "Modifier les caractéristiques de la demande d'analyse",
      ])

    @endif

    @if ($demande->signe)

        @bouton([
        'type' => 'route',
        'route' => 'routeurResultatsPdf',
        'id' => $demande->id,
        'couleur' => "btn-rouge",
        'fa' => 'fas fa-file-pdf',
        'intitule' => __('boutons.show_pdf'),
        'target' => '_blank',
        ])

    @endif

    @if ($demande->acheve)

      @bouton([
      'type' => 'route',
      'route' => 'exports.demande',
      'id' => $demande->id,
      'fa' => "fas fa-table",
      'couleur' => "btn-success",
      'intitule' => __('boutons.exporter'),
      'title' => "Exporter en fichier excel",
      ])


    @endif

    @retour(['route' => route('demandes.index')])

  </div>

</div>
