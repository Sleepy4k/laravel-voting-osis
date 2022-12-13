@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                Log Authentikasi
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @includeIf('partials.table.audit.auth')
                </div>
            </div>
        </div>
    </section>
@endsection