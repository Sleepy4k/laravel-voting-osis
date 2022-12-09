<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @includeIf('partials.head.meta')
        @includeIf('partials.head.title')
        @includeIf('partials.head.icon')
        @includeIf('partials.head.fonts.admin')
        @includeIf('partials.head.css.admin')
    </head>
    <body>
        <div id="app">
            <div id="main">
                @include('admin.partials.sidebar')
                @include('admin.partials.header')

                <div class="page-content">
                    @hasSection('content')
                        @yield('content')
                    @endif
                </div>

                @include('admin.partials.footer')
            </div>
        </div>

        @includeIf('partials.head.script.admin')
    </body>
</html>