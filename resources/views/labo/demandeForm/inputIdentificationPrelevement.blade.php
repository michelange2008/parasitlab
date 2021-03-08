<div class="form-group type_coll input_type">

  <label for="nomPrelevement_{{ $i }}">{{ ucfirst(__('form.identification')) }}</label>

  <div class="d-flex flew-row">

    <div class="col-md-6">

      <div class="input-group">

        <div class="input-group-prepend">

          <div id="vide_numero_animal_{{ $i }}" class="vide_numero_animal pointeur input-group-text"><i class="text-danger fas fa-times"></i></div>

        </div>

        <input id="numero_animal_{{ $i }}" list="animal_num_{{ $i }}" class="identif numero_animal form-control" type="text" name="animal_{{$i}}" placeholder="@lang('form.num')">

        <datalist id="animal_num_{{ $i }}" class="animal_num"></datalist>

      </div>

    </div>

    <div class="col-md-6">

      <input id="nom_animal_{{ $i }}" class="identif nom_animal form-control" type="text" name="identification_{{$i}}" placeholder="@lang('form.nom')">

    </div>

  </div>


</div>
