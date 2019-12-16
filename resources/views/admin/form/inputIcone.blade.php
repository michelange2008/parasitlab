<img class="img-50 col-form-label" src="{{ asset('storage/img/icones')."/".$user->labo->icone->nom }}" alt="">

<label class="col-form-label" for="icone">Photo: </label>

<input class="form-control" type="file" name="icone" value="{{$user->labo->icone->nom}}">
