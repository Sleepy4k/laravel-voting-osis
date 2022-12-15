@extends('layouts.admin')

@section('content')
    <section id="basic-vertical-layouts">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">@lang('page.page.create.title')</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    @includeIf('partials.form.system.page.create')
                </div>
            </div>
        </div>
    </section>
@endsection