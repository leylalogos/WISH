<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item text-right">
                <a class="nav-link text-right" href="{{ route('index') }}">
                    <img id="navbar-logo" src="{{ url('frontend/images/Wish.png') }}" />
                </a>
            </li>
            <li class="nav-item text-right">
                <a class="nav-link text-right" href="{{ route('index') }}">
                    {{ __('navbar.index') }}
                </a>
            </li>
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
                    <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('logout') }}">{{ __('static.logout') }}</a>
                        <a class="dropdown-item" href="{{ route('profile') }}">{{ __('static.profile') }}</a>
                    </div>
                </li>
            @endauth
        </ul>
    </div>
</nav>
