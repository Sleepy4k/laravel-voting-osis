@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">@lang('page.audit.query.title')</div>
            <div class="card-body">
                <div class="table-responsive">
                    @includeIf('partials.table.audit.query')
                </div>
            </div>
        </div>
    </section>
@endsection