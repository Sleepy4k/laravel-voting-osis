<form class="form form-vertical" action="#">
    @csrf
    
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="name">@lang('form.menu.name')</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $menu->id }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="label">@lang('form.menu.label')</label>
                    <input type="text" id="label" name="label" class="form-control" value="{{ $menu->label }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="ordering">@lang('form.menu.ordering')</label>
                    <input type="number" id="ordering" name="ordering" class="form-control" value="{{ $menu->ordering }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="role">@lang('form.menu.role')</label>
                    <input type="text" id="role" name="role" class="form-control" value="{{ $menu->role }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('admin.system.menu.index') }}" class="btn btn-success me-1 mb-1">@lang('form.button.back')</a>
                </div>
            </div>
        </div>
    </div>
</form>