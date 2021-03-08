{{-- BLOC VALABLE AUSSI BIEN POUR UNE VETERINAIRE QUE POUR UN ELEVEUR D'OU L'EMPLOI DE $personne --}}
<i class="fas fa-phone mr-3"></i>
@if ($personne->indicatif !== "33")
  <span class="mr-3">({{ $personne->indicatif }})</span>
@endif
{{ $personne->tel }}
