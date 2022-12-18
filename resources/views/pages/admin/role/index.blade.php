@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">@lang('page.role.index.title')</div>
            <div class="card-body">
                <div class="table-responsive">
                    @includeIf('partials.table.admin.role')
                </div>
            </div>
        </div>
    </section>
@endsection