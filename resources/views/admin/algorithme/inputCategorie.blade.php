<div class="form-group">

  <label>@lang('form.categories')</label>

  <div class=" border px-3 py-2">

    @foreach ($categories as $categorie)

      <div class="custom-control custom-radio ">

        <input id="{{ $categorie->nom }}" class="custom-control-input" type="radio" name="categorie" value="{{ $categorie->id }}"

        @if(isset($observation->categorie_id))

          @if ($observation->categorie_id == $categorie->id)

            checked

          @endif

        @endif

        >
        <label class="custom-control-label" for="{{ $categorie->nom }}">{{ $categorie->nom }}</label>

      </div>

    @endforeach

  </div>

</div>
