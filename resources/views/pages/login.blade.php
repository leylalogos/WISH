@extends('layouts.frontend')
@section('title', 'Sign in to Wish')
@section('content')
    <!-- CSS Files -->
    {{-- <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css" /> --}}

    <section class="py-3 py-md-5 py-xl-8">
        <div class="container py-5 h-100">
            <div class="row justify-content-center">
                <div class="col-9 ">
                    <div class="mb-1">
                        <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-3" style="background: whitesmoke;">
                            <h6 class="display-5 fw-bold text-center" style="font-size: 30px;">ورود به حساب
                                کاربری</h6>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center " style="padding: 50px;">
                <div class="col-12 col-lg-10 col-xl-8">
                    <div class="row gy-5 justify-content-center">
                        <div class="col-12 col-lg-5">
                            <form action="#!">
                                <div class="row gy-3 overflow-hidden">
                                    <div class="col-12">
                                        <div class=" mb-3">
                                            <label class="form-label">شماره موبایل</label>

                                            <input type="tell" class="form-control border-0 border-bottom rounded-0"
                                                name="tell" placeholder="شماره موبایل خود را وارد کنید." required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn  btn-lg" type="submit"
                                                style="background: deeppink; color:white;">ورود با شماره
                                                موبایل</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-lg-2 d-flex align-items-center justify-content-center gap-3 flex-lg-column">
                            <div class="bg-dark h-100 d-none d-lg-block" style="width: 1px; --bs-bg-opacity: .1;">
                            </div>
                            <div class="bg-dark w-100 d-lg-none" style="height: 1px; --bs-bg-opacity: .1;"></div>
                            <div>or</div>
                            <div class="bg-dark h-100 d-none d-lg-block" style="width: 1px; --bs-bg-opacity: .1;">
                            </div>
                            <div class="bg-dark w-100 d-lg-none" style="height: 1px; --bs-bg-opacity: .1;"></div>
                        </div>
                        <div class="col-12 col-lg-5 d-flex align-items-center">

                            <div class="d-flex gap-3 flex-column w-100 ">


                                @include('layouts.inc.loginBtn', [
                                    'bootstrapIconClass' => 'fa-brands fa-google',
                                    'brandName' => __('word.google'),
                                    'brand' => 'google',
                                    'loginUrl' => route('login.redirect', ['provider' => 'google']),
                                ])
                                @include('layouts.inc.loginBtn', [
                                    'brand' => 'github',
                                    'bootstrapIconClass' => 'fa-brands fa-github',
                                    'brandName' => __('word.github'),
                                    'loginUrl' => '',
                                ])
                                @include('layouts.inc.loginBtn', [
                                    'brand' => 'facebook',
                                    'bootstrapIconClass' => 'fab fa-facebook-f me-2',
                                    'brandName' => __('word.facebook'),
                                    'loginUrl' => route('login.redirect', ['provider' => 'facebook']),
                                ])
                                {{-- <a href="#!" class="btn btn-lg btn-danger">
                                    <i class="fa-brands fa-google"> </i>
                                    <span class="ms-2 fs-6">ورود با حساب گوگل</span>
                                </a>
                                <a href="#!" class="btn btn-lg btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                    </svg>
                                    <span class="ms-2 fs-6">ورود با حساب فیسبوک</span>
                                </a>
                                <a href="#!" class="btn btn-lg btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-apple" viewBox="0 0 16 16">
                                        <path
                                            d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z" />
                                        <path
                                            d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z" />
                                    </svg>
                                    <span class="ms-2 fs-6">ورود با حساب تويیتر</span>
                                </a> --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-7">


                    <div class="row justify-content-center">

                        @include('layouts.inc.loginBtn', [
                            'bootstrapIconClass' => 'fa-brands fa-google',
                            'brandName' => __('word.google'),
                            'brand' => 'google',
                            'loginUrl' => route('login.redirect', ['provider' => 'google']),
                        ])
                        @include('layouts.inc.loginBtn', [
                            'brand' => 'github',
                            'bootstrapIconClass' => 'fa-brands fa-github',
                            'brandName' => __('word.github'),
                            'loginUrl' => '',
                        ])
                        @include('layouts.inc.loginBtn', [
                            'brand' => 'facebook',
                            'bootstrapIconClass' => 'fab fa-facebook-f me-2',
                            'brandName' => __('word.facebook'),
                            'loginUrl' => route('login.redirect', ['provider' => 'facebook']),
                        ])
                    </div>

                </div>
            </div>
        </div>
    </section> --}}
@endsection
