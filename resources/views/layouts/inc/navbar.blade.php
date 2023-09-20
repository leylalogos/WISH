<nav class="navbar navbar-expand-lg navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item text-right">
                <a class="nav-link text-right" href="{{ route('index') }}">
                    <img id="navbar-logo" src="{{ url('frontend/images/Wish.png') }}" style="height: 1.5rem;" />
                </a>
            </li>
            {{-- <li class="nav-item text-right">
                <a class="nav-link text-right" href="{{ route('index') }}">
                    {{ __('navbar.index') }}
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">
                    {{ __('navbar.about') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact') }}">
                    {{ __('navbar.contact') }}
                </a>
            </li>
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        {{ __('navbar.login') }}
                    </a>
                </li>
            @endguest
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile') }}">
                        {{ __('navbar.profile') }}
                    </a>
                </li>
                <li class="nav-item dropdown" id="nav-profile">
                    <img id="nav-profile-img" src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('logout') }}">{{ __('static.logout') }}</a>
                    </div>
                </li>
            @endauth
        </ul>
    </div>
</nav>
