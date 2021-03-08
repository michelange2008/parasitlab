{{-- AFFICHE LE DÉTAIL DES MEMBRES DU LABORATOIRE --}}
<div class="card" >

  <img class="img-100-100" src="{{ url('storage/img/labo/photos/'.$user->labo->photo)}}" alt="picture">

  <div class="card-body">

    <h5 class="card-title">{{ $user->name }}</h5>

    <p class="card-text">{{ HTML::mailto($user->email) }}</p>

    <p class="card-text">{{ $user->labo->fonction }}</p>

    <img class="img-50" src="{{ url('storage/img/labo/signatures/'.$user->labo->signature) }}" alt="signature">

  </div>

  <div class="card-footer">

    @boutonUser([
      'route' => 'laboAdmin.edit',
      'id' => $user->id,
      'intitule' => 'voirmodif',
      'couleur' => 'btn-bleu',
      ])

    @retour(['route' => route('laboAdmin.index')])

  </div>

</div>
