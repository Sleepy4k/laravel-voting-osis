<a href="{{ route('admin.system.application.create') }}" class="btn btn-primary me-1 mb-1 float-end">Ubah Data</a>
<table class="table table-striped" id="table1">
    <thead>
        <tr>
            <th>@lang('table.application.app_name')</th>
            <th>@lang('table.application.app_icon')</th>
            <th>@lang('table.application.meta_author')</th>
            <th>@lang('table.application.meta_keywords')</th>
            <th>@lang('table.application.meta_description')</th>
        </tr>
    </thead>
    <tbody>
        <tr class="text-center">
            <td nowrap="nowrap">{{ $application->app_name }}</td>
            <td nowrap="nowrap">
                @if (isset($application->app_icon))
                    @if (file_exists(public_path('storage/image/' . $application->app_icon)))
                        <a href="{{ asset("storage/image/".$application->app_icon) }}" data-lightbox="example-1"><img id="zoom-img" class="img-fluid mb-3" src="{{ asset("storage/image/".$application->app_icon) }}" width="50"></a>
                    @else
                        <a href="{{ asset('assets/images/logo/favicon.png') }}" data-lightbox="example-1"><img id="zoom-img" class="img-fluid mb-3" src="{{ asset('assets/images/logo/favicon.png') }}" width="50" alt="Default image"></a>
                    @endif
                @else
                    <a href="{{ asset('assets/images/logo/favicon.png') }}" data-lightbox="example-1"><img id="zoom-img" class="img-fluid mb-3" src="{{ asset('assets/images/logo/favicon.png') }}" width="50" alt="Default image"></a>
                @endif
            </td>
            <td nowrap="nowrap">{{ $application->meta_author }}</td>
            <td nowrap="nowrap">{{ $application->meta_keywords }}</td>
            <td nowrap="nowrap">{{ Str::limit($application->meta_description, 100, '...') }}</td>
        </tr>
    </tbody>
</table>