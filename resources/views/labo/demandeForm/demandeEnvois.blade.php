<div class="row">

  <div class="col-md-10 mx-auto">

    <p class="lead pl-3 bg-bleu-tres-fonce text-white">Envois et facture</p>

  </div>

</div>

<div class="row justify-content-center">

  <div class="col-md-5">

    <!-- DOIT ON ENVOYER LES RESULTATS AU VETO -->
    @include('labo.demandeForm.inputEnvoiVeto')

  </div>

  <div class="col-md-5">

    <!-- CHOIX DU VETO -->
    @include('admin.form.inputveto')

  </div>

  <div class="col-md-10">

    @include('labo.demandeForm.inputEnvoiFacture')

  </div>

</div>

  {{-- <div class="form-group">
    <label for="vetoSelect">Vétérinaire</label>
    <select multiple class="form-control" id="vetoSelect" name="veto">
      @foreach ($vetos as $veto)
        <option>{{mb_convert_case($veto->user->name, MB_CASE_TITLE)}}</option>
      @endforeach
    </select>
  </div> --}}

  <!-- CHOIX DU DESTINATAIRE DE LA FACTURE -->
