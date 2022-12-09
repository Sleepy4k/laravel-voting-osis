@extends('layouts.error')

@section('title', 'System Error')
@section('message', 'The website is currently unaivailable. Try again later or contact the developer.')

@section('image')
    <img class="img-error" src="{{ asset('assets/images/samples/error-500.svg') }}" alt="Not Found">
@endsection