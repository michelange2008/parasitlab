<div style="margin-left:0px; border: 1px solid black; padding-left:20px">

  <table>
    <tbody>
      <tr>
        <td style="width:500px; font-weight:bold">
          {{ $demande->user->name }}
        </td>
        <td>
          ede: {{ $demande->user->eleveur->num }}
        </td>
      </tr>
      <tr>
        <td>
          {{ $demande->user->eleveur->address_1 }}
          {{ ($demande->user->eleveur->address_2 == null) ? "" : " - "}}
          {{ $demande->user->eleveur->address_2}}
        </td>
      </tr>
      <tr>
        <td style="width:250px">
          {{ $demande->user->eleveur->cp }} {{ $demande->user->eleveur->commune }}
        </td>
        <td>
          {{ $demande->user->email }}
        </td>
      </tr>
    </tbody>
  </table>


</div>
