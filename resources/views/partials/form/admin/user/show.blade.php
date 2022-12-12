<form class="form form-vertical" action="#">
    @csrf
    
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="nis">Nis</label>
                    <input type="text" id="nis" name="nis" class="form-control" value="{{ $user->nis }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="grade">Kelas</label>
                    <select id="grade" name="grade" class="form-select" readonly disabled>
                        <option value="{{ $user->grade }}">{{ $user->grade }}</option>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="status">Status</label>
                    @if ($user->voting_status == 'true')
                        <input type="text" id="status" name="status" class="form-control" value="Sudah Voting" readonly disabled>
                    @else
                        <input type="text" id="status" name="status" class="form-control" value="Belum Voting" readonly disabled>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="col-12 d-flex justify-content-end">
                    @if ($user->voting_status == 'true')
                        <a href="{{ route('admin.custom.reset', ['user' => $user->id, 'candidate' => $user->voting->candidate_id]) }}" class="btn btn-primary me-1 mb-1">Reset Voting</a>
                    @else
                        <a href="" class="btn btn-primary me-1 mb-1 disabled">Reset Voting</a>
                    @endif
                    <a href="{{ route('admin.user.index') }}" class="btn btn-success me-1 mb-1">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>