@extends('layouts.resultatsPDF')

@section('content')

  @include('labo.resultats.pdf.entetePdfLabo')

  @include('labo.resultats.pdf.demande_pdf')

@endsection
