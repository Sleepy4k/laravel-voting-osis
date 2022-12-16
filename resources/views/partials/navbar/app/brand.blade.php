<a class="navbar-brand" href="{{ url('/') }}">
    {{ isset($meta->app_name) ? $meta->app_name : config('app.name') }}
</a>