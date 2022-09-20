<!--
Issu de choisir.blade: passe en revue le json chix analyse et présente toutes les
options avec affichage au clic des situation et anatypes
-->
@foreach ($choix as $esp => $détails)

  <div id="{{ $esp }}_choix" class="espece_choix row row-cols-1 row-cols-md-2 g-4" style="display:none">


      @foreach ($détails as $item)

        <div class="col">

          <div class="accordion" id="{{ $esp.$item->nom }}">

            <div class="card my-1">

              <div class="card-header">

                <h5 id="{{ $item->id }}" class="card-title alert alert-secondary situation"
                  role="button">

                  <img class="img-40" src="{{ url('storage/img/icones/'.$item->icone) }}" alt="">

                  {{__('choisir2.'.$item->nom)}}

                </h5>

                <div class="card-body">

                  <!-- groupe de signes observés qui s'affichent quand on clique sur la
                  situation correspondante -->
                  <ul id="{{ $esp.'_'.$item->id }}" class="signes list-group"
                    style="display:none">

                    @foreach ($item->signes as $signe)

                      <div class="list-group-item list-group-item-action">


                        <div class=" d-flex flex-row justify-content-between align-items-center">
                          <!-- signe observé sur lequel on clique pour connaître l'analyse-->
                          <div id="{{ $esp.'_'.$signe->nom }}_signe"
                            class="signe btn btn-light"
                            type="button"
                            data-toggle="collapse" data-target="#{{ $esp.'_'.$signe->nom }}_ana"
                            aria-expanded="false"  aria-controls="{{ $esp.'_'.$signe->nom }}_ana"
                            >
                            {{ ucfirst(__('choisir2.'.$signe->nom)) }}
                          </div>


                          <div id="{{ $esp.'_'.$signe->nom }}_ana"
                            class="collapse anatype font-weight-bold color-bleu-fonce">

                            @foreach ($signe->anatypes as $anatype)

                              <div class=" d-flex flex-row align-items-center">

                                <img class="img-40 m-2"
                                src="{{ url('storage/img/icones/'.$anatypes->where('abbreviation', $anatype)->first()->icone->nom) }}"
                                alt="{{ $anatypes->where('abbreviation', $anatype)->first()->nom }}">

                                <div>{{ ucfirst($anatypes->where('abbreviation', $anatype)->first()->nom) }}</div>

                              </div>

                            @endforeach

                          </div>

                        </div>

                        <div class="ml-3">

                          <small>{{ $signe->texte }}</small>

                        </div>
                      </div>

                    @endforeach

                  </ul>
                </div>

              </div>

            </div>

          </div>

      </div>

    @endforeach

  </div>

@endforeach
