

        <p style="text-align:right" class="adresse"><strong>{{ $demande->tovetouser->name }}</strong></p>
        <p style="text-align:right" class="adresse">{{ $demande->tovetouser->veto->address_1 }}</p>
        <p style="text-align:right" class="adresse">{{ $demande->tovetouser->veto->address_2 }}</p>
        <p style="text-align:right" class="adresse">{{ $demande->tovetouser->veto->cp }}
            {{ $demande->tovetouser->veto->commune }}</p>


<p class="adresse adresse-petit">@lang('commun.eleveur')&nbsp;: <strong>{{ $demande->user->name }}</strong></p>
<p class="adresse adresse-petit">{{ $demande->user->eleveur->address_1 }}</p>
<p class="adresse adresse-petit">{{ $demande->user->eleveur->address_2 }}</p>
<p class="adresse adresse-petit">{{ $demande->user->eleveur->cp }} {{ $demande->user->eleveur->commune }}</p>
