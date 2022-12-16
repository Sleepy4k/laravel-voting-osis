<form class="form form-vertical" action="{{ route('admin.system.page.update', $page->id) }}" method="POST">
    @csrf
    @method('put')
    
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="name">@lang('form.page.name')</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="@lang('form.page.placeholder.name')" value="{{ old('name', $page->name) }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="label">@lang('form.page.label')</label>
                    <input type="text" id="label" name="label" class="form-control" placeholder="@lang('form.page.placeholder.label')" value="{{ old('label', $page->label) }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="menu_id">@lang('form.page.menu_id')</label>
                    <select id="menu_id" name="menu_id" class="form-select" required autofocus>
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}" {{ ($page->menu_id == $menu->id) ? 'selected' : '' }}>{{ $menu->label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="route">@lang('form.page.route')</label>
                    <input type="text" id="route" name="route" class="form-control" placeholder="@lang('form.page.placeholder.route')" value="{{ old('route', $page->route) }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="icon">@lang('form.page.icon')</label>
                    <input type="text" id="icon" name="icon" class="form-control" placeholder="@lang('form.page.placeholder.icon')" value="{{ old('icon', $page->icon) }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="permission">@lang('form.page.permission')</label>
                    <input type="text" id="permission" name="permission" class="form-control" placeholder="@lang('form.page.placeholder.permission')" value="{{ old('permission', $page->permission) }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">@lang('form.button.submit.edit')</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">@lang('form.button.reset')</button>
                    <a href="{{ route('admin.system.page.index') }}" class="btn btn-success me-1 mb-1">@lang('form.button.back')</a>
                </div>
            </div>
        </div>
    </div>
</form>