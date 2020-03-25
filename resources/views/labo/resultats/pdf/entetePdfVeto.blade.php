<table>
  <tbody>
    <tr>
      <td style="width:380px"></td>
      <td "style:border-top: solid 1px black; border-left: solid 1px black">
        <p class="adresse"><strong>{{ $demande->veto->user->name }}</strong></p>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <p class="adresse">{{ $demande->veto->address_1 }}</p>
      </td>
    </tr>
    <tr>
      <td>
      </td>
      <td>
        <p class="adresse">{{ $demande->veto->address_2 }}</p>
      </td>
    </tr>
    <tr>
      <td>
        <p class="adresse adresse-petit">ELEVEUR&nbsp;: <strong>{{ $demande->user->name }}</strong></p>
      </td>
      <td>
        <p class="adresse">{{ $demande->veto->cp }} {{ $demande->user->commune }}</p>
      </td>
    </tr>
    <tr>
      <td>
        <p class="adresse adresse-petit">{{ $demande->user->eleveur->address_1 }}</p>
      </td>
    </tr>
    <tr>
      <td>
        <p class="adresse adresse-petit">{{ $demande->user->eleveur->address_2 }}</p>
      </td>
    </tr>
    <tr>
      <td>
        <p class="adresse adresse-petit">{{ $demande->user->eleveur->cp }} {{ $demande->user->eleveur->commune }}</p>
      </td>
    </tr>
  </tbody>
</table>


{{-- <div style="margin-left:380px; border: 1px solid black; padding-left:20px"> --}}


{{-- </div>

<div style="width:380px; border: 1px solid black; padding-left:20px">


</div> --}}
