<form id="choix_options" class="" action="{{ route('essai.store') }}" method="post">
  @csrf

  <input id="input_espece" type="text" name="espece" value="5">
  <input id="input_age" type="text" name="age" value="2">
  <input id="input_1" type="text" name="categorie_1" value="">
  <input id="input_2" type="text" name="categorie_2" value="">
    <input id="input_3" type="text" name="categorie_3" value="27">
<input type="submit" class="btn btn-success" name="" value="OK">
  </div>
</form>
