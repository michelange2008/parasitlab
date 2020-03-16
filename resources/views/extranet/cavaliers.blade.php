@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-xl-8">

        @titre(['titre' => "Cavalières, propriétaires de chevaux ... mieux comprendre la parasitisme de vos animaux&nbsp;!", 'icone' => 'cv_rond.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10 col-xl-8">

        <ul class="list-unstyled">

          <li class="media my-3">

            <img src="{{ url('storage/img/cv_poulain.jpg') }}" alt="Jument et poulain">

            <div class="media-body ml-3">

              <h4 class="mt-0 mb-3">La parasitisme, un phénomène naturel moins inquiétant que l'on ne croit</h4>
              <p>Bien que les chevaux soient très souvent parasités, il est important de bien comprendre les différentes situations.</p>
              <p>Le poulain s'infeste systématiquement par le lait de la mère mais aussi son crottin. Dans les premiers mois de sa vie, une attention particulière doit être attachée à la vermifugation du jeune sous la mère.</p>
              <p>
                Par contre, les chevaux adultes ne sont pas aussi souvent parasités que l'on peut le penser, d'autant plus qu'ils sont capables de développer une immunité vis-à-vis des strongles.
              </p>

            </div>

          </li>

          <li class="media my-3">

            <div class="media-body mr-3">

              <h4>Tenir compte des conditions de pâturage</h4>

              <p>L'intensité du parasitisme dépend surtout des condtions de pâturage.</p>
              <p>Des animaux nombreux sur de petites parcelles risquent de connaître de plus fortes infestations par les strongles digestifs</p>
              <p>
                Des animaux peu nombreux sur des parcelles assez grandes vont souvent être peu parasités.

              </p>

            </div>

            <img src="{{ url('storage/img/cv_pature.jpg') }}" alt="Chevaux au pâturage">

          </li>

          <li class="media my-3">

            <img src="{{ url('storage/img/cv_naseau.jpg') }}" alt="Naseau de cheval">

            <div class="media-body ml-3">

              <h4 class="mt-0 mb-3">Résistances aux antiparasitaires, ne gâchons pas nos dernières cartouches!</h4>
              <p>La résistance vis-à-vis des anthelmintiques est régulièrement signalée pour les parasites digestifs des chevaux.</p>
              <p>Le recours à un petit nombre de molécules de façon systématique favorise à terme l'apparition de ses résistances (cf. <a href="{{ route('parasitisme.resistances') }}"><i class="fas fa-video"></i> vidéo</a>).</p>
              <p>Il est indispensable d'adopter aujourd'hui une démarche visant à limiter l'extension de ces résistances.</p>
              <p>Pour cela, il suffit de ne traiter que les chevaux pour lesquels le parasitisme dépasse un certain seuil.
                 C'est en réalisant des examens coproscopiques que l'on peut vérifier les niveaux d'infestation par les strongles digestifs.
               </p>
               <p>La réduction du nombre de traitements a aussi un effet positif, en diminuant les rejets d'anthelminthiques dans l'environnement (cf. <a href="{{ route('parasitisme.entomofaune') }}"><i class="fas fa-book-reader"></i> article entomofaune</a>)</p>
            </div>

          </li>

        </ul>

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10 col-xl-8">

        <div class="alert-bleu p-3">
          <p class="lead mb-0">
            Pour toutes ces raisons, il est important de réaliser systématiquement des examens coproscopiques sur le crottin des chevaux avant tout traitement.
          </p>
        </div>
      </div>

    </div>

    <div class="row justify-content-center my-3">

      <div class="col-md-10 col-xl-8">

        <hr class="divider">

        <div class="card-deck">

          @include('extranet.commentfaireautre')

          @include('extranet.contacteznous')

        </div>

      </div>

    </div>


  </div>

@endsection
