@foreach ($especes as $espece)

  @if ($espece->ages->isNotEmpty())

    @foreach ($espece->ages as $age)

      <a href="{{ route($route.'.age', $age->id) }}">

        <img id="age_{{ $age->id }}" class="img-50 tete age" src="{{ url('storage/img/icones/'.$age->icone->nom) }}" alt="{{ $age->icone->nom }}">

      </a>

    @endforeach

  @else

    <a href="{{ route($route.'.espece', $espece->id) }}">

      <img id="espece_{{ $espece->id }}" class="img-50 tete espece" src="{{ url('storage/img/icones/'.$espece->icone->nom) }}" alt="{{ $espece->icone->nom }}">

    </a>

  @endif

@endforeach
