{{-- AFFICHE LE DÉTAIL DES MEMBRES DU LABORATOIRE --}}
<div class="card" >

  <img class="img-100" src="{{ asset('storage/img/labo/photos')."/".$user->labo->photo}}" alt="">

  <div class="card-body">

    <h5 class="card-title">{{ $user->name }}</h5>

    <p class="card-text">{{ HTML::mailto($user->email) }}</p>

    <p class="card-text">{{ $user->fonction }}</p>

    <img class="img-50" src="{{ asset('storage/img/labo/signatures')."/".$user->labo->signature }}" alt="">

  </div>

  <div class="card-footer">

    @include('fragments.boutonUser', [
      'route' => 'laboAdmin.edit',
      'id' => $user->id,
      'intitule' => 'Voir/modifier',
      'couleur' => 'btn-bleu',
      ])

  </div>

</div>
