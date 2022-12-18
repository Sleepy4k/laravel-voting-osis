<form class="form form-vertical" action="#">
    @csrf
    
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="name">@lang('form.permission.name')</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $permission->name }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="guard_name">@lang('form.permission.guard_name')</label>
                    <input type="text" id="guard_name" name="guard_name" class="form-control" value="{{ $permission->guard_name }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('admin.permission.index') }}" class="btn btn-success me-1 mb-1">@lang('form.button.back')</a>
                </div>
            </div>
        </div>
    </div>
</form>