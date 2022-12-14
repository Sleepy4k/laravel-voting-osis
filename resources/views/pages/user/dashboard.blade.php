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

                                    @if (file_exists(public_path('storage/image/' . $candidate->image)))
                                        <img src="{{ asset('storage/image/' . $candidate->image) }}" class="card-img-top" alt="{{ $candidate->image }}">
                                    @else
                                        <img src="{{ asset('image/candidate.jpg') }}" class="card-img-top" alt="candidate.jpg">
                                    @endif
                                    
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
                                        <form class="d-grid gap-2 p-3" action="{{ route('main.dashboard.store', $candidate->id) }}" method="POST">
                                            @csrf
                                            
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">

                                            <button class="btn btn-primary">@lang('page.user.dashboard.vote')</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-danger">
                        <h4 class="alert-heading">@lang('page.user.dashboard.already_vote')</h4>
                        <p>@lang('page.user.dashboard.admin_help')</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection