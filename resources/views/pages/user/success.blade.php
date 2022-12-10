@extends('layouts.error')

@section('title', 'Voting Berhasil')
@section('message', 'Terimakasih telah melakukan voting.')

@section('image')
    <img class="img-error" src="{{ asset('assets/images/undraw_voting_nvu7 (1).svg') }}" alt="Succes">
@endsection

@section('button')
    <a class="btn btn-lg btn-outline-primary mt-3" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="icon-mid bi bi-box-arrow-left me-2"></i>{{ __('Logout') }}
    </a>

    <form class="d-none" id="logout-form" action="{{ route('logout.store') }}" method="POST">
        @csrf
    </form>
@endsection