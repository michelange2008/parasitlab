@extends('layouts.resultatsPDF')

@section('content')

  @include('labo.resultats.pdf.entetePdfVeto')

  @include('labo.resultats.pdf.demande_pdf')

@endsection
