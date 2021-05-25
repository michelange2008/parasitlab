@if ($prelevement->estMelange)

  <td height="50px" style="border-bottom: solid 1px black; border-right: solid 1px black">
    {{ $prelevement->melange->nom ?? ''}}
  </td>

@else

  <td height="50px" style="border-bottom: solid 1px black; border-right: solid 1px black">
    {{ $prelevement->animal->numero ?? '' }}
  </td>

@endif
