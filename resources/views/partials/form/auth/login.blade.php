<form method="POST" action="{{ route('login.store') }}">
    @csrf

    <div class="form-group position-relative has-icon-left mb-4">
        <input id="nis" name="nis" type="number" value="{{ old('nis') }}" class="form-control form-control-xl" placeholder="@lang('form.login.placeholder.nis')" required autofocus>
        <div class="form-control-icon">
            <i class="bi bi-person"></i>
        </div>
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input id="password" name="password" type="password" class="form-control form-control-xl" placeholder="@lang('form.login.placeholder.password')" required autofocus>
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>
    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">@lang('form.login.submit')</button>
</form>