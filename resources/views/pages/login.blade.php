@extends('layouts.frontend')
@section('content')
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-6 offset-xl-1">
                    <div class="card">

                        <div class="card-body mt-4">

                            <a class="btn btn-danger btn-lg btn-block" style="background-color: red"
                                href="{{ route('login.google') }}" role="button">
                                <i class="fab fa-facebook-f me-2"></i>
                                {{ __('static.login with') . __('word.google') }}

                            </a><br>
                            <a class="btn btn-danger btn-lg btn-block" style="background-color: black" href=""
                                role="button">
                                <i class="fab fa-facebook-f me-2"></i>
                                {{ __('static.login with') . __('word.github') }}

                            </a><br>
                            <a class="btn btn-dark btn-lg btn-block" style="background-color: blue" href="#!"
                                role="button">
                                <i class="fab fa-twitter me-2"></i>
                                {{ __('static.login with') . __('word.facebook') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
