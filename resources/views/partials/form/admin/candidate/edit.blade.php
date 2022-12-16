<form class="form form-vertical" action="{{ route('admin.candidate.update', $candidate->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="chairman">@lang('form.candidate.chairman')</label>
                    <input type="text" id="chairman" name="chairman" class="form-control" placeholder="@lang('form.candidate.placeholder.chairman')" value="{{ old('chairman', $candidate->chairman) }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="vice_chairman">@lang('form.candidate.vice_chairman')</label>
                    <input type="text" id="vice_chairman" name="vice_chairman" class="form-control" placeholder="@lang('form.candidate.placeholder.vice_chairman')" value="{{ old('chairman', $candidate->vice_chairman) }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="image">@lang('form.candidate.image')</label>
                    @if (file_exists(public_path('storage/image/'.$candidate->image)))
                        <div>
                            <img src="{{ asset('storage/image/'.$candidate->image) }}" class="show-image-candidate img-fluid mb-3 col-sm-5" style="max-width: 12.5em; max-height: 12.5em;">
                        </div>
                    @else
                        <img class="show-image-candidate img-fluid mb-3 col-sm-5" style="max-width: 12.5em; max-height: 12.5em;">
                    @endif
                    <input type="file" id="image" name="image" onchange="ShowImageCandidate()" class="logo-candidate form-control">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="vision">@lang('form.candidate.vision')</label>
                    <textarea id="vision" name="vision" class="form-control" rows="3" placeholder="@lang('form.candidate.placeholder.vision')" required autofocus>{{ old('vision', $candidate->vision) }}</textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="mission">@lang('form.candidate.mission')</label>
                    <textarea id="mission" name="mission" class="form-control" rows="3" placeholder="@lang('form.candidate.placeholder.mission')" required autofocus>{{ old('mission', $candidate->mission) }}</textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">@lang('form.button.submit.edit')</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">@lang('form.button.reset')</button>
                    <a href="{{ route('admin.candidate.index') }}" class="btn btn-success me-1 mb-1">@lang('form.button.back')</a>
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