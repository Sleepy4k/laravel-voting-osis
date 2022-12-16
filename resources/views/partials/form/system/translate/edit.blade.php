<form class="form form-vertical" action="{{ route('admin.system.translate.update', $translate->id) }}" method="POST">
    @csrf
    @method('put')
    
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="group">@lang('form.translate.group')</label>
                    <input type="text" id="group" name="group" class="form-control" placeholder="@lang('form.translate.placeholder.group')" value="{{ old('group', $translate->group) }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="key">@lang('form.translate.key')</label>
                    <input type="text" id="key" name="key" class="form-control" placeholder="@lang('form.translate.placeholder.key')" value="{{ old('key', $translate->key) }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="lang_id">@lang('form.translate.lang_id')</label>
                    <input type="text" id="lang_id" name="lang_id" class="form-control" placeholder="@lang('form.translate.placeholder.lang_id')" value="{{ old('lang_id', $translate->text['id']) }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="lang_en">@lang('form.translate.lang_en')</label>
                    <input type="text" id="lang_en" name="lang_en" class="form-control" placeholder="@lang('form.translate.placeholder.lang_en')" value="{{ old('lang_en', $translate->text['en']) }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">@lang('form.button.submit.edit')</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">@lang('form.button.reset')</button>
                    <a href="{{ route('admin.system.translate.index') }}" class="btn btn-success me-1 mb-1">@lang('form.button.back')</a>
                </div>
            </div>
        </div>
    </div>
</form>