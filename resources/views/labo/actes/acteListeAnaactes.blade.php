<h4>Liste des actes possibles</h4>

@foreach ($anaactes as $anaacte)

  <div class="form-row justify-content-center">

    <div class="form-group col-10 col-md-8 col-lg-4 text-right">

      {{ ucfirst($anaacte->nom) }}&nbsp;:

    </div>

    <div class="form-group col-2">

      <input class="form-control" type="number" name="anaacte_{{ $anaacte->id }}" value="0">

    </div>

  </div>

@endforeach
