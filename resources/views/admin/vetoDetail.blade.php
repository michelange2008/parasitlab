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

    @if (auth()->user()->usertype->route === 'laboratoire')

      <div class="card-footer">
        @boutonUser([
          'route' => 'vetoAdmin.edit',
          'id' => $user->id,
          'intitule' => 'voirmodif',
          'couleur' => 'btn-bleu',
        ])
      </div>

    @endif

  </div>

@endisset
