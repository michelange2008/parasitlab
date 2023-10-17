@extends('layouts.app')

@section('menu')
    @include('labo.laboMenu')
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row my-3 justify-content-center">

            <div class="col-md-10">

                @include('fragments.flash')

            </div>

        </div>

        <div class="row my-3">

            <div class="col-md-10 mx-auto">

                @titre(['titre' => __('titres.add_acte'), 'icone' => 'pack-envoi.svg'])

            </div>

        </div>

        <div class="row my-3 justify-content-center">

            <div class="col-md-10">

                <form action="{{ route('acteToUser.store', $user) }}" method="POST">
                    @csrf
                    @foreach ($actes as $acte)
                    <div class="form-group">

                      <label for="acte_{{ $acte->id }}">{{ ucfirst($acte->nom) }}</label>
                      <input class="form-control" type="number" name="acte_{{ $acte->id }}" value=1>
                    </div>

                    @endforeach

                    @enregistreAnnule()
                </form>

            </div>

        </div>

    </div>
@endsection
