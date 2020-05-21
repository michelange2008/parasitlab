{{-- lignes pour l'enregistrement des images: photo et signature de l'utilisateur --}}
<div class="row align-items-center">

  <div class="col-md-6">

    @include('admin.form.inputImage', [
      'image' => $user->labo->photo,
      'chemin' => 'storage/img/labo/photos/',
      'name' => 'photo'
    ])

  </div>

  <div id="input_signataire" class="col-md-6" statut = "{{ $user->labo->est_signataire }}" style="display:none">

    @include('admin.form.inputImage', [
      'image' => $user->labo->signature,
      'chemin' => 'storage/img/labo/signatures/',
      'name' => 'signature'
    ])

  </div>

</div>
