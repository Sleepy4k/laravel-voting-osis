<form method="post" action="{{ route('admin.custom.import') }}" enctype="multipart/form-data">
    @csrf

    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="user-import-excel">@lang('form.user.import.title')</h5>
        </div>
        <div class="modal-body">
            <label for="excel">@lang('form.user.import.select')</label>
            <div class="form-group">
                <input type="file" id="excel" name="excel" class="form-control" required autofocus>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('form.user.import.close')</button>
            <button type="submit" class="btn btn-primary">@lang('form.user.import.submit')</button>
        </div>
    </div>
</form>