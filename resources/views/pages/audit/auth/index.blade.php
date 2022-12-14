@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">@lang('page.audit.auth.title')</div>
            <div class="card-body">
                <div class="table-responsive">
                    @includeIf('partials.table.audit.auth')
                </div>
            </div>
        </div>
    </section>
@endsection