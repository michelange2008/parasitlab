<div class="form-group row">

  <legend class="col-form-label col-md pt-0">@lang('form.type_prelevement')</legend>

  <div class="col-md">

    <div class="custom-control custom-radio custom-control-inline">

      <input class="typeprelevement indiv custom-control-input"
              type="radio"
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

        @lang('form.coll')

      </label>

    </div>

  </div>

</div>
