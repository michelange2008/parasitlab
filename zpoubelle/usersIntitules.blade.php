@foreach ($intitules as $intitule) <!-- issu de tableauEleveurs.json ou tableauVetos.json -->

  <th class="align-middle" data-field="{{ $intitule->id }}" data-sortable="{{ $intitule->sortable}}">{{ $intitule->nom }}</th>
  
@endforeach
