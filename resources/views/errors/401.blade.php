@extends('layouts.error')

@section('title')
    @lang('error.401.title')
@endsection

@section('message')
    @lang('error.401.description')
@endsection

@section('image')
    <img class="img-error" src="{{ asset('assets/images/samples/error-403.svg') }}" alt="Not Found">
@endsection