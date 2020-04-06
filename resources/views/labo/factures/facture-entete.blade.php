@foreach ($demandes as $demande)

  <h4 class="font-weight-bold">{{ ucfirst($demande->anaacte->anatype->nom) }} - ({{ $demande->date_reception }})</h4>

@endforeach
