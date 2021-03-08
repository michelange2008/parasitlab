{{-- BLOC VALABLE AUSSI BIEN POUR UNE VETERINAIRE QUE POUR UN ELEVEUR D'OU L'EMPLOI DE $personne --}}
<i class="fas fa-home mr-3"></i>
<p class="ml-1">{{ $personne->address_1 }}</p>
<p class="ml-1">{{ $personne->address_2 }}</p>
<p class="ml-1">{{ $personne->cp }} {{ $personne->commune }}</p>
@if ($personne->pays !== "France")
  <p class="ml-1">{{ $personne->pays }}</p>
@endif
