@extends('layouts.pdf')

@section('content')

  @include('labo.resultats.pdf.entetePdfLabo')

  @include('labo.resultats.pdf.demande_pdf')

@endsection
