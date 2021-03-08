{{-- Boutons de modification et suppression du prélèvement si analyse non signée--}}
@if (!$demande->signe) {{-- si la demande de prélèvement n'a pas été signée, possibilité de modifier les prélèvements --}}

  <div class="d-flex">

        <a class="mr-3"  href="{{ route('prelevement.edit', $prelevement->id) }}">

          <i class="fas fa-edit text-success"></i>

        </a>

        <a class="mr-3"  href="{{ route('prelevement.prelevdel', $prelevement->id) }}">

          <i class="fas fa-trash-alt text-danger"></i>

        </a>

  </div>

@endif
