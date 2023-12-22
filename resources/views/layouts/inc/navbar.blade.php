<nav class="navbar navbar-expand-lg navbar-dark">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
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
            <li class="nav-item">
                <a class="nav-link" href="{{ route('connection.find-friends') }}">
                    جستجوی افراد
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
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('connection.myFollowersIndex') }}">
                        دوستان من
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('wishlist.create') }}">
                        ایجاد لیست آرزو </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('wishlist.index') }}">
                        لیست آرزوهام </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('anniversary.index') }}">
                        مراسم و سالگرد های من </a>
                </li>
                <li id="nav-profile" class="dropdown" dir="ltr">
                    <a href="#" class=" nav-link dropdown-toggle" data-toggle="dropdown"
                        data-bs-toggle="dropdown">پروفایل
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-content">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="{{ Auth::user()->avatar }}" alt="Alternate Text"
                                            class="img-responsive" />
                                        <p class="text-center small">
                                            <a href="#">ویرایش عکس</a>
                                        </p>
                                    </div>
                                    <div class="mb-2 col-md-7">
                                        <span>{{ Auth::user()->name }}</span>
                                        <p class="text-muted small">
                                            mail@gmail.com</p>
                                        <hr>
                                        <div class="divider">
                                        </div>
                                        <a href="{{ route('profile') }}" class="btn btn-primary btn-sm active">
                                            پروفایل</a>
                                    </div>
                                </div>
                            </div>
                            <div class="navbar-footer">
                                <div class="navbar-footer-content">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <a href="" class="btn btn-default btn-sm" style="background:white">
                                                اکانت های من
                                            </a>
                                        </div>
                                        <div class="mt-2 col-md-6">
                                            <a href="{{ route('logout') }}" class="btn  btn-sm pull-right"
                                                style="background:white">
                                                {{ __('static.logout') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            @endauth
        </ul>
    </div>
</nav>
