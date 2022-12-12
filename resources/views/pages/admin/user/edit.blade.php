@extends('layouts.admin')

@section('content')
    <section id="basic-vertical-layouts">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ubah Data Pemilih</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    @includeIf('partials.form.admin.user.edit')
                </div>
            </div>
        </div>
    </section>
@endsection