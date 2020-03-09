@foreach ($demandes as $demande)

  <h4 class="font-weight-bold">{{ ucfirst($demande->anapack->nom) }} - ({{ $demande->date_reception }})</h4>

@endforeach
