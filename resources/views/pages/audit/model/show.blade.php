@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">@lang('page.audit.model.title')</div>
            <div class="card-body">
                <div class="table-responsive">
                    @includeIf('partials.table.audit.model')
                </div>
            </div>
        </div>
    </section>
@endsection