{{-- Issu de resources/views/labo/demandeForm/demandeLignePrelevement.blade.php
ou resources/views/labo/demandeForm/demandePrincipal.blade.php --}}
<div class="form-group row">

  <legend class="col-form-label col-md-4 col-lg-3 col-xl-2 pt-0">@lang('form.type_prelevement')</legend>

  <div class="col-md">

    <div class="custom-control custom-radio custom-control-inline">

      <input class="typeprelevement indiv custom-control-input"
      type="radio" checked
      name="typeprelevement_{{ $i }}" id="indiv_{{ $i }}"
      value="indiv">

      <label class="custom-control-label" for="indiv_{{ $i }}">

        @lang('form.indiv')

      </label>

    </div>

    <div class="custom-control custom-radio custom-control-inline">

      <input class="typeprelevement coll custom-control-input"
      type="radio"
      name="typeprelevement_{{ $i }}" id="coll_{{ $i }}"
      value="coll">

      <label class="custom-control-label" for="coll_{{ $i }}">

        @lang('form.melange')

      </label>

    </div>

  </div>

</div>
