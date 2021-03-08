<h4 class="my-3">@lang('demandes.demande_sans_prelevement')</h4>

<p>@lang('demandes.saisir_prelev_ou_del')</p>



<div class="row m-3">

<div class="col-auto">

  @bouton([
    'type' => 'route',
    'route' => 'prelevement.createOnDemande',
    'id' => $demande_id,
    'intitule' => 'boutons.add_prel',
    'fa' => "fas fa-edit"
  ])

</div>

<div class="col-auto">
  @include('fragments.boutonSupprimer', [
    'route' => 'demandes.destroy',
    'id' => $demande_id,
    'intitule' => 'boutons.del_demande',
    'fa' => 'fas fa-trash-alt',
  ])

</div>

</div>
