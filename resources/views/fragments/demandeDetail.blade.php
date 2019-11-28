<div class="" id="{{ $collapse }}">
  <div class="card card-body">
    <div class="row">
      <div class="col-md-12 d-inline-flex d-flex justify-content-between">
        <img class="img-50" src="{{ asset('/storage/img/icones/')."/".$demande->espece->icone->nom }}" alt="espece">
        <h3 class="card-title">
          <a class=" color-rouge-tres-fonce" href="{{ route('eleveurAdmin.show', $demande->user->id) }}">
            <strong>{{ $demande->user->name }}</strong>
          </a>
        </h3>
        <h5>
          ({{ $demande->user->eleveur->tel}})
        </h5>
      </div>
    </div>
    <div class="row my-3">

<!-- AFFICHAGE DES INFORMATIONS RELATIVES A L'ANALYSE -->

      <div class="col-md-6">
        <div class="row mx-1">
          <div class="col-md-12 alert-bleu-tres-fonce pt-3 d-inline-flex justify-content-around">
            <h5 class="card-title">ANALYSE</h5>
            <a href="#" title="voir">
              <i class="color-rouge-tres-clair material-icons">picture_as_pdf</i>
            </a>
          </div>
        </div>
        <div class="row mx-1 border">
          <table class="table table-hover">
            <tbody>
              @if ($demande->toveto)
                <tr>
                  <td>
                    <small>-> Vétérinaire</small>
                  </td>
                  <td>
                    <a href="{{ route('vetoAdmin.show', $demande->veto_id)}}">
                      <strong>{{ $demande->veto->user->name}}</strong>
                    </a>
                  </td>
                </tr>
              @endif

              <tr>
                <td>
                  <small>Date de prélèvement : </small>
                </td>
                <td>
                  @if ($demande->date_prelevement !== null)
                    @include('fragments.colonneDate', ['date' => $demande->date_prelevement])
                  @else
                    NC
                  @endif
                </td>
              </tr>
              <tr>
                <td>
                  <small>Date de réception :</small>
                </td>
                <td>
                  @include('fragments.colonneDate', ['date' => $demande->date_reception])
                </td>
              </tr>
              <tr>
                <td>
                  <small>Date de resultats : </small>
                </td>
                <td>
                  @include('fragments.colonneDate', ['date' => $demande->date_resultats])
                </td>
              </tr>
              <tr>
                <td>
                  <small>Date d'envoi : </small>
                </td>
                <td>
                  @include('fragments.colonneDate', ['date' => $demande->date_envoi])
                </td>
              </tr>
              <tr>
                <td>{{ $demande->user->name }}</td>
                <td>
                  <a href="#" title="Renvoyer l'email à l'éleveur">
                    <i class="material-icons">play_arrow</i> <i class="material-icons">email</i></td>
                  </a>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

<!-- AFFUCHAGE DES INFORMATIONS RELATIVES À LA FACTURE-->

      <div class="col-md-6">
        <div class="row mx-1">
          <div class="col-md-12 alert-bleu-tres-fonce pt-3 d-inline-flex justify-content-around">
            <h5 class="card-title">FACTURE</h5>
            <a href="#" title="voir">
              <i class="color-rouge-tres-clair material-icons">picture_as_pdf</i>
            </a>
          </div>
        </div>
        <div class="row mx-1 border">
          <div class="col-md-12">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td>
                    <small>Destinataire : </small>
                  </td>
                  <td>
                    {{ $demande->facture->user->name}}
                  </td>
                </tr>
                <tr>
                  @if ($demande->facture->faite)
                    <td>
                      <small>Montant TTC : </small>
                    </td>
                    <td>
                      <strong>{{ $demande->facture->total_ttc}} € TTC</strong>
                    </td>
                  @else
                    <td class="color-rouge-tres-fonce"><i class="material-icons">warning</i></td>
                    <td class="color-rouge-tres-fonce">
                      facture non établie
                    </td>
                  @endif
                </tr>
                @if ($demande->facture->envoyee)
                  <tr>
                    <td>
                      <small>Facture envoyée le </small>
                    </td>
                    <td>
                      @include('fragments.colonneDate', ['date' => $demande->facture->envoyee_date])
                    </td>
                  </tr>
                @elseif ($demande->facture->faite)
                  <tr>
                    <td class="color-rouge-tres-fonce"><i class="material-icons">warning</i></td>
                    <td class="color-rouge-tres-fonce">
                      facture non envoyée
                    </td>
                  </tr>
                @endif
                @if ($demande->facture->payee)
                  <tr class="alert-success">
                    <td>
                    <small>Facture payée le </small>
                    </td>
                    <td>
                      @include('fragments.colonneDate', ['date' => $demande->facture->payee_date])
                    </td>
                  </tr>
                @elseif ($demande->facture->envoyee)
                  <tr>
                    <td class="color-rouge-tres-fonce"><i class="material-icons">warning</i></td>
                    <td class="color-rouge-tres-fonce">
                      facture non payée
                    </td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


</div>
