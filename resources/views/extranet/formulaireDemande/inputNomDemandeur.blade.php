<div class="col">

  <label for="nom">Nom ou raison sociale</label>

  @if (Auth()->user() && Auth()->user()->usertype->code == "eleveur")

    <input type="text" class="form-control" name="nom" value="{{ Auth()->user()->name }}">

  @else

    <input type="text" class="form-control" name="nom" value="" placeholder="Votre nom ou raison sociale">

  @endif

</div>
