@extends('layouts.admin')

@section('content')
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-12 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="bi-person-fill"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">@lang('page.admin.dashboard.total_voter')</h6>
                                    <h6 class="font-extrabold mb-0">{{ count($users) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="bi-person-check-fill"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">@lang('page.admin.dashboard.already_vote')</h6>
                                    <h6 class="font-extrabold mb-0">{{ count($already_choose) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-12">
                    <div class="card ">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="bi-people-fill"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">@lang('page.admin.dashboard.total_candidate')</h6>
                                    <h6 class="font-extrabold mb-0">{{ count($candidates) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <h1 class="text-center text-primary mt-3">
                        @lang('page.admin.dashboard.voting_result')
                    </h1>
                    <div class="row mt-2 justify-content-center">
                        @foreach($candidates as $candidate)
                            <div class="col-sm-4">
                                <div class="card shadow-lg">
                                    <div class="card-header text-center fw-bold">
                                        {{ $candidate->chairman }} & {{ $candidate->vice_chairman }}
                                    </div>

                                    @if (file_exists(public_path('storage/image/' . $candidate->image)))
                                        <img src="{{ asset('storage/image/' . $candidate->image) }}" class="card-img-top" alt="{{ $candidate->image }}">
                                    @else
                                        <img src="{{ asset('image/candidate.jpg') }}" class="card-img-top" alt="candidate.jpg">
                                    @endif

                                    <div class="card-body text-center">
                                        <h5 class="mt-3">{{ $candidate->total_voting }} @lang('page.admin.dashboard.vote')</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('page.admin.dashboard.latest_voter')</h4>
                </div>
                @foreach ($voters as $voter)
                    <div class="card-content pb-4">
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="{{ asset('assets/images/faces/1.jpg') }}">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">{{ $voter->user->name }}</h5>
                                <h6 class="text-muted mb-0">{{ $voter->user->grade }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>@lang('page.admin.dashboard.voting_result')</h4>
                </div>
                <div class="card-body">
                    <div id="voting-chart"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@once
    @push('addon-script')
        <script src="{{ asset('assets/js/pages/apexcharts.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script>
            var options = {
                series: {!! json_encode($chart['series']) !!},
                labels:  {!! json_encode($chart['label']) !!},
                colors: ["#435ebe", "#55c6e8", "#FEB139", "#EB1D36"],
                chart: {
                    type: "donut",
                    width: "100%",
                    height: "350px"
                },
                legend: {
                    position: "bottom"
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "30%"
                        }
                    }
                },
            };

            var chart = new ApexCharts(document.querySelector("#voting-chart"), options);

            chart.render();
        </script>
    @endpush
@endonce