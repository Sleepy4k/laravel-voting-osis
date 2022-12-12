@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Calon
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @includeIf('partials.table.admin.candidate')
                </div>
            </div>
        </div>
    </section>
@endsection