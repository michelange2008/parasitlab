{{-- Issu de resources/views/labo/demandeForm/demandeLignePrelevement.blade.php
      ou resources/views/labo/demandeForm/demandePrincipal.blade.php --}}
<div class="form-group row">

  <legend class="col-form-label col-md-4 pt-0">@lang('form.type_prelevement')</legend>

  <div class="col-md">

    @foreach ($typesprelevement as $type) {{-- un type de prélèvement est un prélèvement individuel, collectif ou collectif avec des individus --}}

      <div class="custom-control custom-radio custom-control-inline">

        <input class="typeprelevement {{ $type }} custom-control-input"
                type="radio"
                name="typeprelevement_{{ $i }}" id="{{ $type }}_{{ $i }}"
                value="{{ $type }}"
                @if ($type == 'collindiv') disabled @endif
                >

        <label class="custom-control-label" for="{{ $type }}_{{ $i }}">

          @lang('form.'.$type)

        </label>

      </div>

  @endforeach

  </div>

</div>
