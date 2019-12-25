@isset ($user->labo->photo)

  <img class="img-50 col-form-label" src="{{ asset('storage/img/labo/photos')."/".$user->labo->photo }}" alt="">

  {{-- Un champs caché du nom du fichier de signature de façon à pouvoir renommer l'image téléchargée avec le nom d'origine --}}
  <input type="hidden" name="icone" value="{{ $user->labo->photo }}">

@endisset

{{-- Le principe est de télécharger une image et de lui attribuer le nom de l'ancienne image de signature --}}
<label class="col-form-label" for="photo">Photo: </label>

{{-- Un champs visible de saisie d'une image si on veut changer la signature --}}
<input class="form-control" type="file" name="photo" accept="image/jpeg, image/jpg, image/x-png">
