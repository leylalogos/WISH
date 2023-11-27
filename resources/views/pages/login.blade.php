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
                            <form method="post" action="{{ route('login.gsm') }}">
                                @csrf
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
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
