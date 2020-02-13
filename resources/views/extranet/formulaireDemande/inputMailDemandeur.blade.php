<div class="col">

  <label for="email">Email</label>

  @if (Auth()->user() && Auth()->user()->usertype->code == "eleveur")

    <input type="mail" class="form-control" name="email" value="{{ Auth()->user()->email }}">

  @else

    <input type="mail" class="form-control" name="email" value="" placeholder="Votre email">

  @endif

</div>
