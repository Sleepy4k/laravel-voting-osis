@extends('layouts.error')

@section('title')
    @lang('error.404.title')
@endsection

@section('message')
    @lang('error.404.description')
@endsection

@section('image')
    <img class="img-error" src="{{ asset('assets/images/samples/error-404.svg') }}" alt="Not Found">
@endsection