@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-lg-8">

        @titre(['titre' => __('titres.envoiPack'), 'icone' => 'pack-envoi-vide.svg'])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-lg-8">

        <p>{!! __('veterinaires.kit_envoi_1') !!}</p>

        <p>{!! __('veterinaires.kit_envoi_2') !!}</p>

        <p>{!! __('veterinaires.kit_envoi_prix_1')."&nbsp;".$cout_pack."&nbsp;".__('veterinaires.kit_envoi_prix_2') !!}</p>

        <hr class="divider-court">

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10 col-lg-8">

        <form class="" action="{{ route('envoiPackStore') }}" method="post">

          @csrf

          <p class="lead">{!! __('formulaires.envoiPack_soustitre') !!}</p>

          @include('admin.form.identite')

          @include('admin.form.contact')

          <div class="form-inline lead my-3">

            <label for="nb_pack" >{!! __('formulaires.envoiPack_1') !!}</label>
            <input class="form-control mx-3 text-center" type="number" name="nb_pack" value="1" min="1" max="10" step="1">

          </div>

          @enregistreAnnule(["nomBouton" => "valider"])

        </form>

      </div>

    </div>

  </div>

@endsection