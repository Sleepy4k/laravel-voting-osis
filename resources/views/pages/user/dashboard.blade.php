@extends('layouts.app')

@once
    @push('addon-css')
        <style>
            ::-webkit-scrollbar {
                display: none;
            }
        </style>
    @endpush
@endonce

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (auth()->user()->voting_status == 'false')
                    <div class="row justify-content-md-center">
                        @foreach ($candidates as $candidate)
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header text-center fw-bold">
                                        {{ $candidate->chairman }} & {{ $candidate->vice_chairman }}
                                    </div>
                                    <img src="{{ url('/foto_calon/' . $candidate->image) }}" class="card-img-top" alt="...">
                                    <div class="card-body p-0">
                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-heading-visi-{{ $candidate->id }}">
                                                    <button class="accordion-button collapsed"
                                                        style="box-shadow: 0 0 0 0rem " type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapse-visi-{{ $candidate->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="flush-collapse-visi-{{ $candidate->id }}">
                                                        Visi
                                                    </button>
                                                </h2>
                                                <div id="flush-collapse-visi-{{ $candidate->id }}"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="flush-heading-visi-{{ $candidate->id }}"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        {{ $candidate->vision }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-heading-misi-{{ $candidate->id }}">
                                                    <button class="accordion-button collapsed"
                                                        style="box-shadow: 0 0 0 0rem " type="button" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapse-misi-{{ $candidate->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="flush-collapse-misi-{{ $candidate->id }}">
                                                        Misi
                                                    </button>
                                                </h2>
                                                <div id="flush-collapse-misi-{{ $candidate->id }}"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="flush-heading-misi-{{ $candidate->id }}"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        {{ $candidate->mission }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form class="d-grid gap-2 p-3" action="{{ route('main.dashboard.update', $candidate->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            
                                            <button class="btn btn-primary">Vote</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-danger">
                        <h4 class="alert-heading">Anda Sudah Melakukan Voting</h4>
                        <p>Jika anda merasa belum melakukan voting, silahkan hubungin panitia.</p>
                    </div>
                    
                    <a class="btn btn-lg btn-outline-primary mt-3" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="icon-mid bi bi-box-arrow-left me-2"></i>{{ __('Logout') }}
                    </a>

                    <form class="d-none" id="logout-form" action="{{ route('logout.store') }}" method="POST">
                        @csrf
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection