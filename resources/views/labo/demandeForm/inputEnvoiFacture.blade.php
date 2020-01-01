
  <div class="form-group">

    <p for="">Destinataire de la facture</p>

    @foreach ($usertypes as $type)

      <div class="custom-control custom-radio custom-control-inline">

        <input type="radio" id="{{ $type->route }}" name="facture" value="{{ $type->route }}" class="custom-control-input"

        @php
          if($type->route === 'eleveur') echo 'checked';
        @endphp
        >

        <label class="custom-control-label" for="{{ $type->route}}">{{ mb_convert_case($type->nom, MB_CASE_TITLE)}}</label>

      </div>

    @endforeach
    
  </div>
