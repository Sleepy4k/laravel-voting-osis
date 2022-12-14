@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">@lang('page.candidate.index.title')</div>
            <div class="card-body">
                <div class="table-responsive">
                    @includeIf('partials.table.admin.candidate')
                </div>
            </div>
        </div>
    </section>
@endsection