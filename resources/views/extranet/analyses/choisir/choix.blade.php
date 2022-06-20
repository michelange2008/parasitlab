@foreach ($choix as $esp => $détails)

  <div id={{ $esp }} class="row row-cols-1 row-cols-md-2 g-4">


      @foreach ($détails as $item)

        <div class="col">

        <div class="card my-1">

          <div class="card-body">

            <h5 class="card-title alert alert-secondary pointeur">

              <img class="img-40" src="{{ url('storage/img/icones/'.$item->icone) }}" alt="">

              {{__('choisir2.'.$item->nom)}}

            </h5>

            @foreach ($item->signes as $signe)

              <ul class="list-groupe" style="display:none">

                <a href="#" class="list-group-item list-group-item-action">

                  {{ ucfirst(__('choisir2.'.$signe->nom)) }}

                </a>

              </ul>


            @endforeach


          </div>

        </div>

      </div>

    @endforeach

  </div>

@endforeach
