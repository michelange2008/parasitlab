<h4 class="mb-3 titre_analyses" style="display:none">@lang('choisir.analyseproposees')</h4>

<p class="titre_analyses p-3 alert-danger" style="display:none">Attention, il ne s'agit que d'une liste indicative. N'hésitez pas à consulter votre vétérinaire</p>

<div id="liste_analyses" class="ml-0 list_group"></div>

<div id="bouton_pdf" class="mt-3" style="display:none">

  @bouton([
    'bouton_id' => "pdf",
    'type' => 'route',
    'route' => 'analyses.getFormulairePdf',
    'id' => '',
    'couleur' => 'btn-rouge',
    'fa' => 'fas fa-file-pdf',
    'intitule' => 'form.form_download',
  ])

</div>
