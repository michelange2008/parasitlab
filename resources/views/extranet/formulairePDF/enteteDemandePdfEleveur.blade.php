<div style="margin-left:0px; border: 1px solid black; padding-left:20px">

  <table>
    <tbody>
      <tr>
        <td style="width:500px">
          <p class="adresse">{{ $demande->user->name }}</p>
        </td>
        <td>
          <p> ede: {{ $demande->user->eleveur->num }}</p>
        </td>
      </tr>
      <tr>
        <td>
          <p class="adresse">{{ $demande->user->eleveur->address_1 }} - {{ $demande->user->eleveur->address_2 }}</p>
        </td>
      </tr>
      <tr>
        <td style="width:250px">
          <p class="adresse">{{ $demande->user->eleveur->cp }} {{ $demande->user->eleveur->commune }}</p>
        </td>
        <td>
          <p class="adresse">{{ $demande->user->email }}</p>
        </td>
      </tr>
    </tbody>
  </table>


</div>
