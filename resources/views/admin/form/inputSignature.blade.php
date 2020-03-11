@isset ($user->labo->signature)

  <img class="img-50 col-form-label" src="{{ url('storage/img/labo/signatures/'.$user->labo->signature) }}" alt="">

  {{-- Un champs caché du nom du fichier de signature de façon à pouvoir renommer l'image téléchargée avec le nom d'origine --}}
  <input type="hidden" name="signature" value="{{ $user->labo->signature }}">

@endisset

{{-- Le principe est de télécharger une image et de lui attribuer le nom de l'ancienne image de signature --}}
<label class="col-form-label" for="imageSignature">Signature: </label>

{{-- Un champs visible de saisie d'une image si on veut changer la signature --}}
<input class="form-control" type="file" name="imageSignature" accept=".jpg, .png, .jpeg, .svg">
