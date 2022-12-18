@once
    @push('addon-css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush
@endonce

<form class="form form-vertical" action="#">
    @csrf
    
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="name">@lang('form.role.name')</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $role->name }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="guard_name">@lang('form.role.guard_name')</label>
                    <input type="text" id="guard_name" name="guard_name" class="form-control" value="{{ $role->guard_name }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="permission">@lang('form.role.permission')</label>
                    <select id="permission" name="permission[]" class="form-control select2-multiple" multiple readonly disabled>
                        @foreach ($role->permissions as $permission)
                            <option value="{{ $permission->id }}" selected>{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('admin.role.index') }}" class="btn btn-success me-1 mb-1">@lang('form.button.back')</a>
                </div>
            </div>
        </div>
    </div>
</form>

@once
    @push('addon-script')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="{{ asset('assets/js/customs/select2.js') }}"></script>
    @endpush
@endonce