@extends('layouts.frontend')
@section('title', 'Sign in to Wish')
@section('content')
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-12 col-sm-12 col-md-8 col-lg-7 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-7">
                    <div class="row justify-content-center">

                        @include('layouts.inc.loginBtn', [
                            'background' => 'red',
                            'bootstrapIconClass' => 'fa-brands fa-google',
                            'brandName' => __('word.google'),
                            'loginUrl' => route('login.google'),
                        ])
                        @include('layouts.inc.loginBtn', [
                            'background' => 'black',
                            'bootstrapIconClass' => 'fa-brands fa-github',
                            'brandName' => __('word.github'),
                            'loginUrl' => '',
                        ])
                        @include('layouts.inc.loginBtn', [
                            'background' => 'blue',
                            'bootstrapIconClass' => 'fab fa-facebook-f me-2',
                            'brandName' => __('word.facebook'),
                            'loginUrl' => route('auth.facebook'),
                        ])

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
