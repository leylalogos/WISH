@extends('layouts.frontend')
@section('title', 'Profile | ' . $user->name)
@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item active" aria-current="page"> {{ __('static.myprofile') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body text-center">
                            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ $user->name }}</h5>
                            <h5 class="my-3 text-muted">{{ $user->username }}</h5>

                        </div>


                    </div>
                    <div class="row">
                        <div class="col-12 " dir="ltr">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <label>لینک دعوت</label>
                                    <div class="input-group mb-3">
                                        <button id="copy-button" class="btn btn-outline-secondary" type="button"
                                            id="button-addon1" style="width: 75px;">کپی</button>
                                        <input type="text" class="form-control" id="invitation-link"
                                            value="{{ route('invite', ['username' => $user->username]) }}"
                                            aria-label="Example text with button addon" aria-describedby="button-addon1"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        @php
                            $accounts = $user->accounts->pluck('last_login', 'provider')->toArray();
                        @endphp
                        <div class="row mt-2 justify-content-center">
                            @include('layouts.inc.loginBtn', [
                                'bootstrapIconClass' => 'fa-brands fa-google',
                                'brandName' => __('word.google'),
                                'loginUrl' => route('login.redirect', ['provider' => 'google']),
                                'smallView' => true,
                                'hasAccount' => isset($accounts['google']),
                                'brand' => 'google',
                                'alternativeText' => isset($accounts['google']) ? 'آپدیت اکانت ' : 'افزودن حساب',
                            ])
                            @include('layouts.inc.loginBtn', [
                                'bootstrapIconClass' => 'fab fa-facebook-f me-2',
                                'brandName' => __('word.facebook'),
                                'loginUrl' => route('login.redirect', ['provider' => 'facebook']),
                                'smallView' => true,
                                'brand' => 'facebook',
                                'hasAccount' => isset($accounts['facebook']),
                                'alternativeText' => isset($accounts['facebook']) ? 'آپدیت اکانت ' : 'افزودن حساب',
                            ])
                        </div>
                        <div class="div mt-4"></div>


                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            @if ($errors->all())
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li> {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('update.profile') }}" method="post">
                                @csrf
                                <div class="row">
                                    <label class="col-sm-3">{{ __('static.name') }}</label>

                                    <div class="col-sm-9">
                                        <input class=" form-control text-muted mb-0" name="name" type="text"
                                            value="{{ $user->name }}">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <label class="col-sm-3">{{ __('static.username') }}</label>

                                    <div class="col-sm-9">
                                        <input class=" form-control text-muted mb-0" name="username" type="text"
                                            value="{{ $user->username }}">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <label class="col-sm-3">{{ __('static.email') }}</label>
                                    <div class="col-sm-9">
                                        <input class=" form-control text-muted mb-0" type="text" name="email"
                                            value="{{ $user->email }}" disabled>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <label class="col-sm-3">{{ __('static.phone_number') }}</label>
                                    <div class="col-sm-9">
                                        <input class=" form-control text-muted mb-0" type="tel" name="phone_number"
                                            value="{{ $user->phone_number }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <label class="col-sm-3 ">{{ __('static.birthdate') }}</label>
                                    <div class="col-sm-9">
                                        <input class="text-muted mb-0 form-control" type="date" name="birthday"
                                            value="{{ $user->birthday }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-2">

                                    <button id ="btn-profile-section" type="button" class="btn btn-light">
                                        {{ __('static.send') }}
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
