@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">@lang('page.translate.index.title')</div>
            <div class="card-body">
                <div class="table-responsive">
                    @includeIf('partials.table.system.translate')
                </div>
            </div>
        </div>
    </section>
@endsection