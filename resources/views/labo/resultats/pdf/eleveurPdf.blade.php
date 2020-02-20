@extends('layouts.resultatsPDF')

@section('content')

  @include('labo.resultats.pdf.entetePdfELeveur')

  @include('labo.resultats.pdf.demande_pdf')

@endsection
