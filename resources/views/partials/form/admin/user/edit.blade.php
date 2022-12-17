<form class="form form-vertical" action="{{ route('admin.user.update', $user->id) }}" method="POST">
    @csrf
    @method('put')

    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="name">@lang('form.user.name')</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="@lang('form.user.placeholder.name')" value="{{ old('name', $user->name) }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="nis">@lang('form.user.nis')</label>
                    <input type="text" id="nis" name="nis" class="form-control" placeholder="@lang('form.user.placeholder.nis')" value="{{ old('nis', $user->nis) }}" required autofocus>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="grade">@lang('form.user.grade')</label>
                    <select id="grade" name="grade" class="form-select" required autofocus>
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->name }}" {{ ($user->grade == $grade->name) ? 'selected' : '' }}>{{ $grade->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="language">@lang('form.user.language')</label>
                    <select id="language" name="language" class="form-select" required autofocus>
                        @foreach (config('language.list') as $language)
                            <option value="{{ $language }}" {{ ($user->language == $language) ? 'selected' : '' }}>{{ $language }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @role('superadmin')
                <div class="col-12">
                    <div class="form-group">
                        <label for="role">@lang('form.user.role')</label>
                        <select id="role" name="role" class="form-select" required autofocus>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ ($user->getRoleNames()[0] == $role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endrole
            <div class="col-12">
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">@lang('form.button.submit.edit')</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">@lang('form.button.reset')</button>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-success me-1 mb-1">@lang('form.button.back')</a>
                </div>
            </div>
        </div>
    </div>
</form>