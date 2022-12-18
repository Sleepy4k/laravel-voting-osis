<form class="form form-vertical" action="{{ route('admin.permission.update', $permission->id) }}" method="POST">
    @csrf
    @method('put')
    
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="name">@lang('form.permission.name')</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="@lang('form.permission.placeholder.name')" value="{{ old('name', $permission->name) }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="guard_name">@lang('form.permission.guard_name')</label>
                    <select id="guard_name" name="guard_name" class="form-select" required autofocus>
                        @foreach ($guards as $guard)
                            <option value="{{ $guard }}" {{ ($permission->guard_name == $guard) ? 'selected' : '' }}>{{ $guard }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">@lang('form.button.submit.edit')</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">@lang('form.button.reset')</button>
                    <a href="{{ route('admin.permission.index') }}" class="btn btn-success me-1 mb-1">@lang('form.button.back')</a>
                </div>
            </div>
        </div>
    </div>
</form>