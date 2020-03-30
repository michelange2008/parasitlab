<div class="card">

  <div class="card-header alert-bleu-tres-fonce">

    <h5>@lang('formulaireDemande.infos_generales')</h5>

  </div>

  <div class="card-body">

    @include('admin.form.identite')

    {{-- @isset($user->eleveur) --}}

      @include('admin.form.contact', ['personne' => $user->eleveur ?? ''])

      <p>@lang('formulaireDemande.toveto')</p>

      @include('extranet.analyses.formulaireDemande.infosEleveur', ['personne' => $user->eleveur ?? ''])

  </div>

</div>
