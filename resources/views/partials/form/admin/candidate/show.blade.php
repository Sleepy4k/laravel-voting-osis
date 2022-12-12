<form class="form form-vertical" action="#">
    @csrf
    
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="chairman">Nama Ketua</label>
                    <input type="text" id="chairman" name="chairman" class="form-control" value="{{ $candidate->chairman }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="vice_chairman">Nama Wakil</label>
                    <input type="text" id="vice_chairman" name="vice_chairman" class="form-control" value="{{ $candidate->vice_chairman }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="image">Foto Calon</label>
                    <div>
                        @if (file_exists(public_path('storage/image/'.$candidate->image)))
                            <img src="{{ asset('storage/image/'.$candidate->image) }}" class="show-image-candidate img-fluid mb-3 col-sm-5" style="max-width: 12.5em; max-height: 12.5em;">
                        @else
                            <img src="{{ asset('image/candidate.jpg') }}" class="show-image-candidate img-fluid mb-3 col-sm-5" style="max-width: 12.5em; max-height: 12.5em;">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="vision">Visi</label>
                    <textarea id="vision" name="vision" class="form-control" rows="3" readonly disabled>{{ $candidate->vision }}</textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="mission">Misi</label>
                    <textarea id="mission" name="mission" class="form-control" rows="3" readonly disabled>{{ $candidate->mission }}</textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('admin.candidate.index') }}" class="btn btn-success me-1 mb-1">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>