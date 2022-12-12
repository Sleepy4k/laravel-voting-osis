@extends('layouts.auth')

@section('content')
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <h1 class="auth-title">Log in.</h1>
                <p class="auth-subtitle mb-5">Log in menggunakan data yang diberikan panitia.</p>
                @includeIf('partials.form.auth.login')
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">
                <img src="{{ asset('assets/images/saly_2.svg') }}" alt="" width="900">
            </div>
        </div>
    </div>
@endsection
