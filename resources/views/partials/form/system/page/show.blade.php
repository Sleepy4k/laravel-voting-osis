<form class="form form-vertical" action="#">
    @csrf
    
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="name">@lang('form.page.name')</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $page->name }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="label">@lang('form.page.label')</label>
                    <input type="text" id="label" name="label" class="form-control" value="{{ $page->label }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="menu_id">@lang('form.page.menu_id')</label>
                    <select id="menu_id" name="menu_id" class="form-select" readonly disabled>
                        <option value="{{ $page->menu_id }}">{{ $page->menu->label }}</option>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="route">@lang('form.page.route')</label>
                    <input type="text" id="route" name="route" class="form-control" value="{{ $page->route }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="icon">@lang('form.page.icon')</label>
                    <input type="text" id="icon" name="icon" class="form-control" value="{{ $page->icon }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="permission">@lang('form.page.permission')</label>
                    <input type="text" id="permission" name="permission" class="form-control" value="{{ $page->permission ?: '-' }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('admin.system.page.index') }}" class="btn btn-success me-1 mb-1">@lang('form.button.back')</a>
                </div>
            </div>
        </div>
    </div>
</form>