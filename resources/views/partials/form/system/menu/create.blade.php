<form class="form form-vertical" action="{{ route('admin.system.menu.store') }}" method="POST">
    @csrf
    
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="name">@lang('form.menu.name')</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="@lang('form.menu.placeholder.name')" value="{{ old('name') }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="label">@lang('form.menu.label')</label>
                    <input type="text" id="label" name="label" class="form-control" placeholder="@lang('form.menu.placeholder.label')" value="{{ old('label') }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="ordering">@lang('form.menu.ordering')</label>
                    <input type="number" id="ordering" name="ordering" class="form-control" placeholder="@lang('form.menu.placeholder.ordering')" value="{{ old('ordering') }}" min="0" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="role">@lang('form.menu.role')</label>
                    <input type="text" id="role" name="role" class="form-control" placeholder="@lang('form.menu.placeholder.role')" value="{{ old('role') }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">@lang('form.button.submit.add')</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">@lang('form.button.reset')</button>
                    <a href="{{ route('admin.system.menu.index') }}" class="btn btn-success me-1 mb-1">@lang('form.button.back')</a>
                </div>
            </div>
        </div>
    </div>
</form>