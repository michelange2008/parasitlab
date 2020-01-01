<div class="row">

  <div class="col-md-10 mx-auto">

    <p class="lead pl-3 bg-bleu-tres-fonce text-white">Envois et facture</p>

  </div>

</div>

<div class="row justify-content-center">

  <div class="col-md-5">

    <!-- DOIT ON ENVOYER LES RESULTATS AU VETO -->
    @include('labo.demandeForm.inputEnvoiVeto')

    @include('labo.demandeForm.inputChoixVeto')
    
</div>

  <div class="col-md-5">

    <!-- CHOIX DU DESTINATAIRE DE LA FACTURE -->
    @include('labo.demandeForm.inputEnvoiFacture')

  </div>

</div>
