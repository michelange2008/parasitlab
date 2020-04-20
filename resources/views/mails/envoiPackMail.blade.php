<h4>@lang('commun.envoyer_pack', ['nb_pack' => $demande['nb_pack']])</h4>

<p>{{ $demande['name'] }}</p>

<p>{{ $demande['address_1'] }}

  @isset($demande['address_2'])

  - {{ $demande['address_2'] ?? '' }}

  @endisset</p>

<p>{{ $demande['cp'] }} {{ $demande['commune'] }}</p>

<p>{{ $demande['email'] }}</p>

<p>{{ $demande['indicatif'] }} {{ $demande['tel'] }}</p>


{{ ucfirst(__('commun.merci')) }}

Haemonchus contortus vous salue bien bas !
