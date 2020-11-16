
<div class="card-header alert-bleu-tres-fonce d-flex justify-content-between">

{{-- Titre du prélèvement avec le numéro et le nom de l'animal --}}
  <h5 class="">{{ ucfirst($prelevement->identification) ?? '' }} {{ ucfirst($prelevement->animal->numero ?? '') }}</h5>

{{-- Boutons de modification et suppression du prélèvement --}}
  <div class="d-flex">

    <a class="mr-3"  href="{{ route('prelevement.edit', $prelevement->id) }}">

      <i class="fas fa-edit text-success"></i>

    </a>



  </div>

</div>
