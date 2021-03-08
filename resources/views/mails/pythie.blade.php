@extends('layouts.mail')

@section('content')


  <h4>Bonjour</h4>

  <p>

    Demande d'analyse {{ $commentaire->demande->id }}

    ({{ $commentaire->demande->user->name }} - {{ $commentaire->demande->espece->nom }} - {{ $commentaire->demande->anaacte->nom }})

  </p>
<blockquote ><strong>

  <p>{{ $commentaire->commentaire }}</p>

</strong></blockquote>

  <p>Signé: {{ auth()->user()->name }}</p>

  <a href="{{ url(route('demandes.show', $commentaire->demande_id)) }}" class="btn btn-red">Voir</a>

@endsection
