<p class="my-3 demande-titre">{{ mb_strtoupper($demande->anapack->nom) }}</p>


<p><span class="font-italic">Espece : </span>{{ ucfirst($demande->espece->nom) }}</p>
<p><span class="font-italic">Date de prélèvement : </span>{{ $demande->date_prelevement }}</p>

  {{ $demande->informations }}
