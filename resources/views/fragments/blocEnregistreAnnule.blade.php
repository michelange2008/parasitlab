{{-- s'appelle avec le raccourci @enregistreAnnule(['nomBouton' => $nomBouton]) --}}

@include('fragments.boutonEnregistre', ['nomBouton' => $nomBouton ?? 'boutons.save'])

@include('fragments.boutonAnnule', ['route' => $route ?? url()->previous()])
