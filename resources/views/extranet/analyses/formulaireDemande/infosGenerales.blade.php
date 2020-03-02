<div class="card">

  <div class="card-header alert-bleu-tres-fonce">

    <h5>Informations générales</h5>

  </div>

  <div class="card-body">

    @include('admin.form.identite')

    @isset($user->eleveur)

      @include('admin.form.contact', ['personne' => $user->eleveur])

      <p>Si vous souhaitez que nous communiquions les résulat à votre vétérinaire, veuillez indiquer son nom</p>

      @include('extranet.analyses.formulaireDemande.infosEleveur', ['personne' => $user->eleveur])

    @else

      @include('admin.form.contact')

      <p>Si vous souhaitez que nous communiquions les résulat à votre vétérinaire, veuillez indiquer son nom</p>

      @include('extranet.analyses.formulaireDemande.infosEleveur')


    @endisset

  </div>

</div>
