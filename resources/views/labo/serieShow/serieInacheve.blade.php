<div class="row justify-content-center">

  <div class="col-md-8">

    <div class="lead">

      La série n'est pas terminée - Voici la liste des demandes en cours :

    </div>

  </div>

</div>

<div class="row my-3 justify-content-center">

  <div class="col-md-8">

      <table  class="table table-bordered table-hover">

        <thead>

          <tr>

            <th>Numéro</th>
            <th class="text-center">Date de réception</th>
            <th class="text-center">Analyse terminée</th>

          </tr>

        </thead>

        <tbody>

          @foreach ($serie->demandes as $demande)

            <tr>

              <td class="text-center">

                @nomLien([
                  'id' => $demande->id,
                  'nom' => $demande->id,
                  'route' => 'demandes.show',
                  'tooltip' => 'tooltips.affiche_detail_demande',
                ])

              </td>

              <td class="text-center">

                {{ $demande->date_reception }}

              </td>

              <td class="text-center">

                @if($demande->acheve)

                  <span class="color-bleu-tres-fonce">OUI</span>

                @else

                  <span class="color-rouge-tres-fonce">NON</span>

                @endif

              </td>
            </tr>

          @endforeach

        </tbody>

      </table>

  </div>

</div>
