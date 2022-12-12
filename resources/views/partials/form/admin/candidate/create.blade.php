<form class="form form-vertical" action="{{ route('admin.candidate.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="chairman">Nama Ketua</label>
                    <input type="text" id="chairman" name="chairman" class="form-control" placeholder="Nama Ketua" value="{{ old('chairman') }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="vice_chairman">Nama Wakil</label>
                    <input type="text" id="vice_chairman" name="vice_chairman" class="form-control" placeholder="Nama Wakil" value="{{ old('vice_chairman') }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="image">Foto Calon</label>
                    <img class="show-image-candidate img-fluid mb-3 col-sm-5" style="max-width: 12.5em; max-height: 12.5em;">
                    <input type="file" id="image" name="image" onchange="ShowImageCandidate()" class="logo-candidate form-control" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="vision">Visi</label>
                    <textarea id="vision" name="vision" class="form-control" rows="3" placeholder="Visi calon kandidat" required autofocus>{{ old('vision') }}</textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="mission">Misi</label>
                    <textarea id="mission" name="mission" class="form-control" rows="3" placeholder="Misi calon kandidat" required autofocus>{{ old('mission') }}</textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    <a href="{{ route('admin.candidate.index') }}" class="btn btn-success me-1 mb-1">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>

@once
    @push('addon-script')
        <script type="text/javascript" src="{{ asset('assets/js/customs/image.js') }}"></script>
    @endpush
@endonce