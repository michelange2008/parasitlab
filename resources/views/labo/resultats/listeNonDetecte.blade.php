<tr>

  <td colspan="2">

    <p>
      <a class="btn btn-sm btn-secondary" data-toggle="collapse" href="#nonDetecte" role="button"
                aria-expanded="false" aria-controls="nonDetecte" title="Afficher les parasites non-detectés">
        <i class="fas fa-angle-double-down"></i> non détectés
      </a>
    </p>
    <div class="collapse"  id="nonDetecte">

      <span class="font-italic">Parasites recherchés mais non retrouvés (en-dessous du seuil de détection) :</span>
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
