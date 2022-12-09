@extends('layouts.error')

@section('title', 'Not Found')
@section('message', 'The page you are looking not found.')

@section('image')
    <img class="img-error" src="{{ asset('assets/images/samples/error-404.svg') }}" alt="Not Found">
@endsection