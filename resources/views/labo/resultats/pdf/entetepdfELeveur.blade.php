<div style="margin-left:380px; border: 1px solid black; padding-left:20px">

  <p class="adresseNom">{{ $demande->user->name }}</p>
  <p class="adresse">{{ $demande->user->eleveur->address_1 }}</p>
  <p class="adresse">{{ $demande->user->eleveur->address_2 }}</p>
  <p class="adresse">{{ $demande->user->eleveur->cp }} {{ $demande->user->eleveur->commune }}</p>

</div>
