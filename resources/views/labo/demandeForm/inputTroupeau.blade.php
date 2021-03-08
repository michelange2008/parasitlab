<div class="form-group">

  <label for="troupeauSelect">@lang('form.troupeau')</label>

  <select class="form-control" id="troupeauSelect" name="troupeau" required>

    <option selected disabled value="">@lang('form.choix_troupeau')</option>

    <option value="nouveau">@lang('form.new')</option>

  </select>

  {{-- <input class="form-control" type="text" list="cars" name="troupeau" value="" />

  <datalist id="cars">

    <option value="troupeau 1">troupeau 1</option>
    <option value="troupeau 2">troupeau 2</option>
    <option value="troupeau 3">troupeau 3</option>

  </datalist> --}}

</div>
