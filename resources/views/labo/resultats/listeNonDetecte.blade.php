<tr>

  <td colspan="2">

    <p>
      <a class="btn btn-sm btn-secondary" data-toggle="collapse" href="#nonDetecte{{ $prelevement->id }}" role="button"
                aria-expanded="false" aria-controls="nonDetecte{{ $prelevement->id }}" title="Afficher les parasites non-detectés">
        Voir les non détectés <i class="fas fa-angle-double-down"></i>
      </a>
    </p>
    <div class="collapse"  id="nonDetecte{{ $prelevement->id }}">

      <span class="font-italic">Parasites recherchés mais non retrouvés (absents ou présents en-dessous du seuil de détection) :</span>
      @foreach ($prelevement->nonDetecte as $nonDetecte)

        @if ($loop->first)

          {{ ucfirst($nonDetecte) }},

        @elseif ($loop->last)

          {{ $nonDetecte }}.

        @else

          {{ $nonDetecte }},

        @endif

      @endforeach

    </div>

  </td>

</tr>
