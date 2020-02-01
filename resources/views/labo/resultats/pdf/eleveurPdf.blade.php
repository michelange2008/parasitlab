@extends('layouts.pdf')

@section('content')

  @include('labo.resultats.pdf.entetePdfELeveur')

  @include('labo.resultats.pdf.demande_pdf')

@endsection
