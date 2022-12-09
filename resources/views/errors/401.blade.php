@extends('layouts.error')

@section('title', 'Forbidden')
@section('message', 'You are unauthorized to see this page.')

@section('image')
    <img class="img-error" src="{{ asset('assets/images/samples/error-403.svg') }}" alt="Not Found">
@endsection