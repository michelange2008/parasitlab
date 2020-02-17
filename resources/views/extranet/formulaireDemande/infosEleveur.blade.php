<div class="form-group row">

  <div class="col-sm-8">

    @include('extranet.formulaireDemande.input', [
      'for' => 'veto',
      'label' => 'Vétérinaire',
      'type' => 'text',
      'value' => $personne->veto->user->name ?? "",
      'placeholder' => "Nom du vétérinaire",
    ])

  </div>

  <div class="col-sm-4">

    @include('admin.form.inputEde')

  </div>


</div>
