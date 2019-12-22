<label class="col-form-label" for="ede">N° d'inscription à l'Ordre</label>

<div class="input-group col-md-6">

  @isset($user->veto->num)

    <input class="my-2 form-control" type="text" name="num" value="{{ $user->veto->num  ?? '' }}">

  @else

    <input class="my-2 form-control" type="text" name="num" placeholder="numéro à l'Ordre Vétérinaire">

  @endisset


</div>
