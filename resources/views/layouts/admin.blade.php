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
                @includeIf('partials.sidebar.admin')
                @includeIf('partials.navbar.admin.header')

                <div class="page-content">
                    @hasSection('content')
                        @yield('content')
                    @endif
                </div>

                @includeIf('partials.footer.admin')
            </div>
        </div>

        @includeIf('partials.script.admin')
    </body>
</html>