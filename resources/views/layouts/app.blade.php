<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @includeIf('partials.head.meta')
        @includeIf('partials.head.title')
        @includeIf('partials.head.icon')
        @includeIf('partials.head.fonts.app')
        @includeIf('partials.head.css.app')
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="z-index: 99">
                <div class="container">
                    @includeIf('partials.navbar.app.brand')
                    @includeIf('partials.navbar.app.button')
                    @includeIf('partials.navbar.app.main')
                </div>
            </nav>

            <main class="py-4">
                @hasSection('content')
                    @yield('content')
                @endif
            </main>
        </div>

        @includeIf('partials.script.app')
    </body>
</html>