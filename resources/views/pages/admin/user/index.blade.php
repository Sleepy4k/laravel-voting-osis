@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Pemilih
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @includeIf('partials.table.admin.user')
                </div>
            </div>
        </div>
    </section>
@endsection