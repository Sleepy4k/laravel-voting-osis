<title>
    {{ basename(request()->path()) ? ucfirst(basename(request()->path())) . ' |' : '' }} {{ config('app.name') }}
</title>