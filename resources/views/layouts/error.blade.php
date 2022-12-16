<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @includeIf('partials.head.meta')
        @includeIf('partials.head.title')
        @includeIf('partials.head.icon')
        @includeIf('partials.head.css.error')
    </head>
    <body>
        <div id="error">
            <div class="error-page container">
                <div class="col-md-8 col-12 offset-md-2">
                    <div class="text-center">
                        @hasSection('image')
                            @yield('image')
                        @else
                            <img class="img-error" src="{{ asset('assets/images/samples/error-404.svg') }}" alt="Not Found">
                        @endif

                        <h1 class="error-title">
                            @hasSection('title')
                                @yield('title')
                            @endif
                        </h1>

                        <p class='fs-5 text-gray-600'>
                            @hasSection('message')
                                @yield('message')
                            @endif
                        </p>

                        @hasSection('button')
                            @yield('button')
                        @else
                            <a href="{{ route('main.dashboard.index') }}" class="btn btn-lg btn-outline-primary mt-3">@lang('error.back_home')</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>