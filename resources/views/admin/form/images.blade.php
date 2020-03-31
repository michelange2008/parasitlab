{{-- lignes pour l'enregistrement des images: photo et signature de l'utilisateur --}}
<div class="form-group">


    <div class="col-sm-6">

      {{-- Le principe est de télécharger une image et de lui attribuer le nom de l'ancienne image de signature --}}
      <label class="col-form-label" for="photo">{{ ucfirst(__('form.photo')) }}&nbsp;:</label>

      @isset ($user->labo->photo)

        <img class="img-90 col-form-label" src="{{ url('storage/img/labo/photos/'.$user->labo->photo) }}" alt="">

        {{-- Un champs caché du nom du fichier de signature de façon à pouvoir renommer l'image téléchargée avec le nom d'origine --}}
        <input type="hidden" name="icone" value="{{ $user->labo->photo }}">

      @endisset

    </div>

    <div class="col-sm-9">
      {{-- Un champs visible de saisie d'une image si on veut changer la signature --}}
      {{-- <input class="form-control" type="file" name="photo" accept="image/jpeg, image/jpg, image/x-png"> --}}
      @include('admin.form.inputImage', ['name' => 'photo'])

    </div>

  </div>

  <div class="form-group">

    <div class="col-sm-6">

      {{-- Le principe est de télécharger une image et de lui attribuer le nom de l'ancienne image de signature --}}
      <label class="col-form-label" for="imageSignature">{{ ucfirst(__('form.sign')) }}&nbsp;:</label>

      @isset ($user->labo->signature)

        <img class="img-90 col-form-label" src="{{ url('storage/img/labo/signatures/'.$user->labo->signature) }}" alt="@lang('form.sign')">

        {{-- Un champs caché du nom du fichier de signature de façon à pouvoir renommer l'image téléchargée avec le nom d'origine --}}
        <input type="hidden" name="signature" value="{{ $user->labo->signature }}">

      @endisset

    </div>

    <div class="col-sm-9">
      {{-- Un champs visible de saisie d'une image si on veut changer la signature --}}
      {{-- <input class="form-control" type="file" name="imageSignature" accept=".jpg, .png, .jpeg, .svg"> --}}

      @include('admin.form.inputImage', ['name' => 'imageSignature'])


  </div>

</div>
