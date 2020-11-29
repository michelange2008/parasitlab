{{-- bandeau de présentation/saisie du titre des prélèvements et résultats avec nom, numéro et icones de modif --}}
<div class="card-header alert-bleu-tres-fonce d-flex justify-content-between">

  {{-- Titre du prélèvement avec le numéro et le nom de l'animal --}}
  <h5 class="">{{ ucfirst($titre ?? '') }} {{ ucfirst($soustitre ?? '') }}</h5>

  @include('labo.prelevements.iconesAddEditDelPrelev')

</div>
