<form class="form form-vertical" action="{{ route('admin.system.application.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="app_name">@lang('form.application.app_name')</label>
                    <input type="text" id="app_name" name="app_name" class="form-control" placeholder="@lang('form.application.placeholder.app_name')" value="{{ old('app_name', $application->app_name) }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="app_icon">@lang('form.application.app_icon')</label>
                    <div>
                        @if (isset($application->app_icon))
                            @if (file_exists(public_path('storage/image/'.$application->app_icon)))
                                <img src="{{ asset('storage/image/'.$application->app_icon) }}" class="show-image-application img-fluid mb-3 col-sm-5" style="max-width: 12.5em; max-height: 12.5em;">
                            @else
                                <img src="{{ asset('assets/images/logo/favicon.png') }}" class="show-image-application img-fluid mb-3 col-sm-5" style="max-width: 12.5em; max-height: 12.5em;">
                            @endif
                        @else
                            <img src="{{ asset('assets/images/logo/favicon.png') }}" class="show-image-application img-fluid mb-3 col-sm-5" style="max-width: 12.5em; max-height: 12.5em;">
                        @endif
                    </div>
                    <input type="file" id="app_icon" name="app_icon" onchange="ShowImageApplication()" class="logo-application form-control">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="meta_author">@lang('form.application.meta_author')</label>
                    <input type="text" id="meta_author" name="meta_author" class="form-control" placeholder="@lang('form.application.placeholder.meta_author')" value="{{ old('meta_author', $application->meta_author) }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="meta_keywords">@lang('form.application.meta_keywords')</label>
                    <input type="text" id="meta_keywords" name="meta_keywords" class="form-control" placeholder="@lang('form.application.placeholder.meta_keywords')" value="{{ old('meta_keywords', $application->meta_keywords) }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="meta_description">@lang('form.application.meta_description')</label>
                    <textarea id="meta_description" name="meta_description" class="form-control" rows="3" placeholder="@lang('form.application.placeholder.meta_description')" required autofocus>{{ old('meta_description', $application->meta_description) }}</textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">@lang('form.button.submit.add')</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">@lang('form.button.reset')</button>
                    <a href="{{ route('admin.system.application.index') }}" class="btn btn-success me-1 mb-1">@lang('form.button.back')</a>
                </div>
            </div>
        </div>
    </div>
</form>

@once
    @push('addon-script')
        <script type="text/javascript" src="{{ asset('assets/js/customs/image.js') }}"></script>
    @endpush
@endonce