<tr>

  <td colspan="2">

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

  </td>

</tr>
