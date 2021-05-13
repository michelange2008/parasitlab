{{-- issu de demandeLignePrelevement.blade.php --}}
<div id="ligne_indiv_{{ $i }}" class="row">

  <div class="col-md-2 my-1">

    <label class="font-weight-bold" for="nomPrelevement_{{ $i }}">{{ ucfirst(__('form.animaux')) }}</label>

  </div>

  <div class="col-md-4 my-1">

    <div class="input-group">

      <div class="input-group-prepend">

        <div id="vide_numero_animal_{{ $i }}"
        class="vide_numero_animal pointeur input-group-text">
        <i class="text-danger fas fa-times"></i>
      </div>

    </div>

    <input  id="numero_animal_{{$i}}"
    list="animal_num_{{ $i }}"
    class="identif indiv numero_animal form-control"
    type="text" name="numeroAnimal_{{$i}}"
    placeholder="@lang('form.num')"
    required
    >

    <datalist id="animal_num_{{ $i }}" class="animal_num"></datalist>

  </div>
</div>
  <div class="col-md-4 my-1">

    <input id="nom_animal_{{ $i }}"
    class="identif coll nom_animal form-control"
    type="text" name="nomAnimal_{{$i}}"
    placeholder="@lang('form.nom')">

  </div>

</div>

<div id="ligne_melange_{{ $i }}" class="row" style="display:none">

  <div class="col-md-2 my-1">

    <label class="font-weight-bold" for="nomPrelevement_{{ $i }}">{{ ucfirst(__('form.nom_melange')) }}</label>

  </div>

  <div class="col-md-8">

    <input id="nom_melange_{{ $i }}"
      class="identif nom_melange form-control"
      list="melange_{{ $i }}"
     type="text" name="nom_melange_{{ $i }}"
     placeholder="@lang('form.nom_melange')"
     required
     >

     <datalist id="melange_{{ $i }}" class="liste_melanges"></datalist>

  </div>


</div>
