@extends('layouts.admin')

@section('content')
    <section id="basic-vertical-layouts">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">@lang('page.user.create.title')</h4>
                <div>
                    <button type="button" class="btn btn-primary c" data-bs-toggle="modal" data-bs-target="#import-excel">@lang('page.user.import.excel')</button>
                    <a href="{{ route('admin.custom.template') }}" class="btn icon icon-left btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        @lang('page.user.download.template')
                    </a>
                </div>
                <div class="modal fade" id="import-excel" tabindex="-1" role="dialog" aaria-labelledby="user-import-excel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        @includeIf('partials.form.admin.user.import')
                    </div>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    @includeIf('partials.form.admin.user.create')
                </div>
            </div>
        </div>
    </section>
@endsection