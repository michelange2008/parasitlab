<p class="color-bleu lead">@lang('demandes.recu_le') {{ $demande->date_reception }}

@lang('commun.et') @lang('demandes.signe_le'){{ $demande->date_signature }} @lang('commun.par') {{ $demande->labo->user->name }}.</p>

@include('labo.resultatsAnalyse')
