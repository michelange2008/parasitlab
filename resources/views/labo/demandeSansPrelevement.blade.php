<h4 class="my-3">@lang('demandes.demande_sans_prelevement')</h4>

<p>@lang('demandes.saisir_prelev_ou_del')</p>

<div class="row m-3">

  <div class="col">

    <form class="form-inline" action="{{ route('prelevement.definitNbPrelev') }}" method="post">

      @csrf

      <input type="hidden" name="demande_id" value="{{ $demande->id }}">

      <button class="btn btn-bleu my-3 mx-1" type="submit" name="button">
        <i class='fas fa-plus-square'> </i> @lang('form.add_prelev')
      </button>

      <input class="form-control" type="number"
              step="1" min=1
              name="nb_prelevement"
              value="" placeholder="Nombre de prélèvements"
              required>
    </form>


    @include('fragments.boutonSupprimer', [
      'route' => 'demandes.destroy',
      'id' => $demande_id,
      'intitule' => 'boutons.del_demande',
      'fa' => 'fas fa-trash-alt',
    ])

  </div>

</div>
