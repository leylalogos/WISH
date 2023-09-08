@extends('layouts.frontend')

@section('content')
    <div class="index-card" style="margin-top:0px;">
        <div class="text-center mt-5">
            <h1> {{ __('static.slogan') }} </h1>
            <a href="{{ route('login.google') }}" class="btn btn-light  mt-5">
                {{ __('static.start creating my wish list') }}
            </a>
        </div>
    </div>
    <div class="container">
        <div class="index-card">
            <div class="text-center mt-5">
                <h1> {{ __('static.goal') }} </h1>
            </div>
            <div class="text-center static-text">
                {!! nl2br(__('texts.about')) !!}
            </div>
        </div>
        <div class="index-card">
            <div class="text-center mt-5">
                {{ __('static.invite to login') }}
            </div>
            <div class="mt-5">
                <form method="POST" action="#">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-3 " style="margin-right:25%;">
                            <a href="{{ route('login.google') }}"
                                class="btn btn-danger btn-block">{{ __('static.login with google') }} </a>
                            <a href="#" class="btn btn-primary btn-block">{{ __('static.login with facebook') }}</a>
                            <a href="#" class="btn btn-light btn-block">{{ __('static.login with github') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
