@isset($user)

  <div class="card">

    @include('admin.detail.nomNum')

    <ul class="list-group list-group-flush">

      @include('admin.detail.contact')

      @isset($vetoInfos->nbDemandes)
        <li class="list-group-item">
          @lang('commun.total_demandes')<span class="badge badge-success ml-3">{{ $vetoInfos->nbDemandes }}</span>
        </li>
      @endisset


    </ul>

    <div class="card-footer">
      @include('fragments.boutonUser', [
        'route' => 'vetoAdmin.edit',
        'id' => $user->id,
        'intitule' => __('boutons.voirmodif'),
        'couleur' => 'btn-bleu',
        ])
    </div>
  </div>

@endisset
