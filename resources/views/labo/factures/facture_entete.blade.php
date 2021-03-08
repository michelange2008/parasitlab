@foreach ($elementDeFacture->demandes as $demande)

  <h4 class="font-weight-bold">{{ ucfirst($demande->anaacte->anatype->nom) }} - ({{ \Carbon\Carbon::parse($demande->date_reception)->isoFormat('LL') }})</h4>

@endforeach
