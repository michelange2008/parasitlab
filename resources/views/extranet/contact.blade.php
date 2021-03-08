@extends('layouts.app')

@section('menu')

  @include("extranet.menuExtranet")

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @titre(['titre' => __('titres.contact'), 'icone' => 'contact.svg'])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        <div class="card-deck">

          @foreach ($contacts as $contact)

          @include('fragments.carte', [
            'icone' => $contact->icone,
            'titre' => __($contact->prefixe.'titre'),
            'texte_1' => __($contact->prefixe.'texte_1'),
            'texte_2' => __($contact->prefixe.'texte_2'),
            'type' => $contact->type ?? '',
            'adresse' => $contact->adresse ?? '',
            'lien' => $contact->lien ?? '',
            'fa' => $contact->fa ?? '',
            'adresse' => 'contact@parasitlab.org',
            'intitule' => __($contact->prefixe.'intitule'),
          ])

          @endforeach

        </div>

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10">

        @include('extranet.contact.map')

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10">
        <hr class="divider">

        @retour(['route' => route('accueil')])

      </div>

    </div>

  </div>

@endsection
