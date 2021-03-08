<div style="margin-left:0px; border: 1px solid black; padding-left:20px">

  <table>
    <tbody>
      <tr>
        <td style="width:450px; font-weight:bold">
          {{ $demande->user->name }}
        </td>
        <td>
          ede: {{ $demande->eleveur->num ?? '' }}
        </td>
      </tr>
      <tr>
        <td>
          {{ $demande->eleveur->address_1 ?? '' }}
          {{ $demande->eleveur->address_2 ?? '' }}
        </td>
      </tr>
      <tr>
        <td style="width:250px">
          {{ $demande->eleveur->cp ?? '' }} {{ $demande->eleveur->commune ?? '' }}
        </td>
        <td>
          {{ $demande->user->email }}
        </td>
      </tr>
    </tbody>
  </table>


</div>
