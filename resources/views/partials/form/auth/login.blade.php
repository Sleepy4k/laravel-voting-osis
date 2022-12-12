<form method="POST" action="{{ route('login.store') }}">
    @csrf

    <div class="form-group position-relative has-icon-left mb-4">
        <input id="nis" name="nis" type="number" placeholder="Nomer Induk Siswa" value="{{ old('nis') }}" class="form-control form-control-xl @error('nis') is-invalid @enderror" required autofocus>
        <div class="form-control-icon">
            <i class="bi bi-person"></i>
        </div>
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input id="password" name="password" type="password" placeholder="Password" class="form-control form-control-xl @error('password') is-invalid @enderror" required autofocus>
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>
    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
</form>