{{-- s'appelle avec le raccourci @enregistreAnnule(['nomBouton' => $nomBouton]) --}}

@include('fragments.boutonEnregistre', ['nomBouton' => $nomBouton ?? "Enregistre"])

@include('fragments.boutonAnnule', ['route' => 'laboratoire'])
