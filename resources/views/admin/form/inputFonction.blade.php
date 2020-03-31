<div class="row">

  <div class="col-md-5">

    <label class="col-form-label" for="fonction">{{ ucfirst(__('form.fonction')) }}&nbsp;:</label>

    @isset($user->labo->fonction)

      <input class="form-control" type="text" name="fonction" value="{{ $user->labo->fonction  ?? old('fonction') }}">

    @else

      <input class="form-control" type="text" name="fonction" placeholder="@lang('form.fonction')" value="{{ old('fonction') }}">

    @endisset

  </div>

  <div class="col-md-5">

    <label class="col-form-label" for="signataire">{{ ucfirst(__('form.signataire')) }}&nbsp;:</label>

    @isset($user->labo->est_signataire)

      @if($user->labo->est_signataire == 1)

        <input class="form-control" type="checkbox" name="signataire" checked>

      @else

        <input class="form-control" type="checkbox" name="signataire">

      @endif

    @else

      <input class="form-control" type="checkbox" name="signataire">

    @endisset

  </div>

</div>
