<h4 class="my-3">Cette demande d'analyse n'a encore aucun prélèvement !</h4>

<p>Que souhaitez-vous faire: supprimer cette demande ou saisir les prélèvements&nbsp;?</p>



<div class="d-flex justify-content-between m-3">


@bouton([
  'type' => 'route',
  'route' => 'prelevement.createOnDemande',
  'id' => $demande_id,
  'intitule' => 'boutons.add_prel',
  'fa' => "fas fa-edit"
])

@include('fragments.boutonSupprimer', [
  'route' => 'demandes.destroy',
  'id' => $demande_id,
  'intitule' => 'boutons.del_demande',
  'fa' => 'fas fa-trash-alt',
])

@retour()

</div>
