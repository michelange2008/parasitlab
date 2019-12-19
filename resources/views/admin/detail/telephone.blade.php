{{-- BLOC VALABLE AUSSI BIEN POUR UNE VETERINAIRE QUE POUR UN ELEVEUR D'OU L'EMPLOI DE $personne --}}
<i class="material-icons mr-3">phone</i>
@if ($personne->indicatif !== "33")
  <span class="mr-3">({{ $personne->indicatif }})</span>
@endif
{{ $personne->tel }}
