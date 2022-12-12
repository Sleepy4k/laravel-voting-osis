<form class="form form-vertical" action="{{ route('admin.user.store') }}" method="POST">
    @csrf
    
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nama Pemilih" value="{{ old('name') }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="nis">Nis</label>
                    <input type="text" id="nis" name="nis" class="form-control" placeholder="Nis Pemilih" value="{{ old('nis') }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="grade">Kelas</label>
                    <select id="grade" name="grade" class="form-select" required autofocus>
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->name }}">{{ $grade->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Kata Sandi" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Konfirmasi Kata Sandi" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-success me-1 mb-1">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>