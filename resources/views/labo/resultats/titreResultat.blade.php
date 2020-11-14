
<div class="card-header alert-bleu-tres-fonce d-flex justify-content-between">

  <h5 class="mb-0">{{ ucfirst($prelevement->identification) ?? '' }} {{ ucfirst($prelevement->animal->numero ?? '') }}</h5>

  <div class="d-flex">

    <a class="mr-3" href="{{ route('prelevement.edit', $prelevement->id) }}">
      <i class="fas fa-edit text-success"></i>
    </a>

    <form id="form_{{ $prelevement->id }}" class="suppr" action="{{ route('prelevement.destroy', $prelevement->id) }}" method="post">

      @csrf

      @method('delete')

      <button class="btn" type="submit">

        <i class="fas fa-trash-alt text-danger"></i>

      </button>

    </form>

  </div>

</div>
