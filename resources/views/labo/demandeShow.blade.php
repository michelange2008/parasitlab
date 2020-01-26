<!-- INFORMATIONS SUR L'ANALYSE-->
<div class="card">
  <div class="card-header">

    @include('labo.demandeShow.titreDemande')

    <div class="d-flex flex-row justify-content-between">

      <a class="d-block btn btn-lg btn-bleu" href="{{ route('resultats.edit', $demande->id )}}">Saisie/Modification des résultats</a>

      @if (auth()->user()->labo->est_signataire && !$demande->signe)

        <div id="#bloc-signature">

          <a id="asigner" attribut="{{ $demande->id }}" class="d-block btn btn-lg btn-rouge" href="{{ route('demande.signer', $demande->id )}}">Signer</a>

          <div id="signe" style="display:none" class="icone-cadre">

            <img class="img-40" src="{!! asset('storage/img/icones/signature.svg') !!}" alt="signé" title="Cette demande a été signée le {{ $demande->date_signature }}">

          </div>

        </div>


      @endif

      @if ($demande->signe)

        <div class="icone-cadre" title="Cette demande a été signée le {{ $demande->date_signature }}">

          <img id="signe" class="img-40" src="{!! asset('storage/img/icones/signature.svg') !!}" alt="signé">

        </div>

      @endif

      @if($demande->signe && $demande->date_envoi === null)

        <a id="aenvoyer" attribut="{{ $demande->id }}" class="d-block btn btn-lg btn-rouge" href="{{ route('demande.envoyer', $demande->id )}}">Envoyer</a>

        <div id="envoye" class="icone-cadre" title="Cette demande a été envoyée le {{ $demande->date_signature }}" style="display:none" >

          <img class="d-block img-40" src="{!! asset('storage/img/icones/envoye.svg') !!}" alt="envoyé">

        </div>


      @endif

    </div>


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
