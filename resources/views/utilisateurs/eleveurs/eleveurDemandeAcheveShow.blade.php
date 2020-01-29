<p class="color-bleu lead">Demande d'analyse reçue le {{ $demande->date_reception }}

et signée le {{ $demande->date_signature }} par {{ $demande->labo->user->name }}.</p>

@include('labo.resultatsAnalyse')
