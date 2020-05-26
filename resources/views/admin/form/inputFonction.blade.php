<div class="col-md-6 my-3">

  <label class="col-form-label" for="fonction">{{ ucfirst(__('form.fonction')) }}&nbsp;:</label>

  @isset($user->labo->fonction)

    <input class="form-control" type="text" name="fonction" value="{{ $user->labo->fonction  ?? old('fonction') }}">

  @else

    <input class="form-control" type="text" name="fonction" placeholder="@lang('form.fonction')" value="{{ old('fonction') }}">

  @endisset

</div>

<div class="col-md-6 m-3">

  <div class="custom-control custom-switch">

    @isset($user->labo->est_signataire)

      @if($user->labo->est_signataire == 1)

        <input class="custom-control-input" type="checkbox" id="signataire" name="signataire" checked>

      @else

        <input class="custom-control-input" type="checkbox" id="signataire" name="signataire">

      @endif

    @else

      <input class="custom-control-input" type="checkbox" id="signataire" name="signataire">

    @endisset

    <label class="custom-control-label" for="signataire">{{ ucfirst(__('form.signataire')) }}</label>

  </div>

</div>
