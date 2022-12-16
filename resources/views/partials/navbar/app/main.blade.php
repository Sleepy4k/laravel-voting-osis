<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto"></ul>
    <ul class="navbar-nav ms-auto">
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    @lang('navbar.welcome', ['user' => auth()->user()->name])
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="icon-mid bi bi-box-arrow-left me-2"></i>{{ __('Logout') }}
                    </a>

                    <form class="d-none" id="logout-form" action="{{ route('logout.store') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</div>