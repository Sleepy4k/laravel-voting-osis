<form class="form form-vertical" action="#">
    @csrf
    
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="group">@lang('form.translate.group')</label>
                    <input type="text" id="group" name="group" class="form-control" value="{{ $translate->group }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="key">@lang('form.translate.key')</label>
                    <input type="text" id="key" name="key" class="form-control" value="{{ $translate->key }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="lang_id">@lang('form.translate.lang_id')</label>
                    <input type="text" id="lang_id" name="lang_id" class="form-control" value="{{ $translate->text['id'] }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="lang_en">@lang('form.translate.lang_en')</label>
                    <input type="text" id="lang_en" name="lang_en" class="form-control" value="{{ $translate->text['en'] }}" readonly disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('admin.system.translate.index') }}" class="btn btn-success me-1 mb-1">@lang('form.button.back')</a>
                </div>
            </div>
        </div>
    </div>
</form>