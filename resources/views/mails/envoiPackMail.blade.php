<h4>Merci d'envoyer {{ $demande['nb_pack'] }} pack d'envoi à:</h4>

<p>{{ $demande['name'] }}</p>

<p>{{ $demande['address_1'] }}

  @isset($demande['address_2'])

  - {{ $demande['address_2'] ?? '' }}

  @endisset</p>

<p>{{ $demande['cp'] }} {{ $demande['commune'] }}</p>

<p>{{ $demande['email'] }}</p>

<p>{{ $demande['indicatif'] }} {{ $demande['tel'] }}</p>


Merci...

Haemonchus contortus vous salue bien bas !
