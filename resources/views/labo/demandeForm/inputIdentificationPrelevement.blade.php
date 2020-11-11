<div class="form-group type_coll input_type">

  <label for="nomPrelevement_{{ $i }}">{{ ucfirst(__('form.identification')) }}</label>

  <input class="form-control" type="text" name="identification_{{$i}}" placeholder="@lang('form.nom')">

  <input list="animal_num" class="type_indiv form-control" type="text" name="animal_{{$i}}" placeholder="@lang('form.num')">

  <datalist id="animal_num" class="">

  </datalist>


</div>
