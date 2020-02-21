@extends('layouts.demandePDFlayout')

@section('content')

  @include('extranet.formulairePDF.enteteDemandePdfEleveur')

  @include('extranet.formulairePDF.demandePdfAnapack')

@endsection
