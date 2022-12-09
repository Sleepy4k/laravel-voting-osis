<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @includeIf('partials.head.meta')
        @includeIf('partials.head.title')
        @includeIf('partials.head.icon')
        @includeIf('partials.head.css.auth')
    </head>
    <body>
        <div id="auth">
            @hasSection('content')
                @yield('content')
            @endif
        </div>
    </body>
</html>