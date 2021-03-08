@extends('layouts.resultatsPDF')

@section('content')

  @include('labo.resultats.pdf.entetepdfELeveur')

  @include('labo.resultats.pdf.demande_pdf')

@endsection
