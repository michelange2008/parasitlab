<div class="collapse" id="{{ $collapse }}">
  <div class="card card-body">
    <div class="row">
      <div class="col-md-12 d-inline-flex d-flex justify-content-between">
        <img class="img-50" src="{{ asset('/storage/img/icones/')."/".$demande->espece->icone->nom }}" alt="espece">
        <h5 class="card-title">
          <a href="{{ route('eleveurAdmin.show', $demande->user->id) }}">
            {{ $demande->user->name }}
          </a>
        </h5>
        <p> ({{ $demande->user->eleveur->tel}}) </p>
      </div>
    </div>
    @if ($demande->toveto)
      <div class="row my-3">
        <div class="col-md-12">
          <small>Vétérinaire:</small>
          <a href="{{ route('vetoAdmin.show', $demande->veto_id)}}">
            <strong>{{ $demande->veto->user->name}}</strong>
          </a>
        </div>
      </div>
    @endif
    <div class="row my-3">
      <div class="col-md-6">
          <small>Date de prélèvement</small>
          @include('fragments.colonneDate', ['date' => $demande->date_prelevement])
          <small>Date de réception</small>
          @include('fragments.colonneDate', ['date' => $demande->date_reception])
          <small>Date de resultats</small>
          @include('fragments.colonneDate', ['date' => $demande->date_resultats])
          <small>Date d'envoi</small>
          @include('fragments.colonneDate', ['date' => $demande->date_envoi])

      </div>
      </div>
    </div>
    <div class="row my-3">
      <h5>Facture</h5>
    </div>
    <div class="row">
      <div class="col-md-4">
        <small>Destinataire : </small>{{ $demande->facture->user->name}}
      </div>
      @if ($demande->facture->faite)
        <div class="col-md-4">
          <small>Montant HT : </small>{{ $demande->facture->total_ht}} €
        </div>
        <div class="col-md-4">
          <small>Montant TTC : </small>{{ $demande->facture->total_ht}} €
        </div>
      @else
        <div class="col-md-8 alert-rouge-tres-fonce">
          facture non établie
        </div>
      @endif
    </div>
    <div class="row my-3">
      @if ($demande->facture->envoyee)
        <div class="col-md-6">
          <small>Facture envoyée le </small>
          @include('fragments.colonneDate', ['date' => $demande->facture->envoyee_date])
        </div>
      @elseif ($demande->facture->faite)
        <div class="col-md-6 alert-rouge-tres-fonce">
          facture non envoyée
        </div>
      @endif
      @if ($demande->facture->payee)
        <div class="col-md-6 alert-success">
          <small>Facture payée le </small>
          @include('fragments.colonneDate', ['date' => $demande->facture->payee_date])
        </div>
      @elseif ($demande->facture->envoyee)
        <div class="col-md-6 alert-rouge-tres-fonce">
          facture non payée
        </div>
      @endif
    </div>
  </div>
</div>
