@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                Log System
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @includeIf('partials.table.audit.system')
                </div>
            </div>
        </div>
    </section>
@endsection