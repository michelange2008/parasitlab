@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-8 col-lg-6">

        @include('labo.demandeShow.titreDemande')

        @if ($demande->acheve)

          @include('utilisateurs.eleveurs.eleveurDemandeInacheveShow')

        @else

          @include('utilisateurs.eleveurs.eleveurDemandeAcheveShow')

        @endif

      </div>

    </div>

  </div>

@endsection
