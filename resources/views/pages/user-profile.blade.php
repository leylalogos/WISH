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
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ $user->name }}</h5>
                            <h5 class="my-3 text-muted">{{ $user->username }}</h5>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <form action="{{ route('update.social_network') }}" method="post">
                                    @csrf
                                    <li class=" d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                        <input class="text-muted mb-0" type="text"
                                            placeholder="{{ __('static.instagram') }}" name="instagram"
                                            value="{{ $user->instagram }}">
                                    </li>
                                    <li class=" d-flex justify-content-between align-items-center p-3">
                                        <i class="fa-brands fa-facebook fa-lg" style="color: #3b5998;"></i>
                                        <input class="text-muted mb-0" type="text"
                                            placeholder="{{ __('static.facebook') }}" name="facebook"
                                            value="{{ $user->facebook }}">
                                    </li>
                                    <li class=" d-flex justify-content-between align-items-center p-3">
                                        <i class="fa-brands fa-square-x-twitter fa-lg"></i>
                                        <input class="text-muted mb-0"
                                            type="text"placeholder="{{ __('static.twitter') }}" name="twitter"
                                            value="{{ $user->twitter }}">
                                    </li>
                                    <li class=" d-flex justify-content-between align-items-center p-3">
                                        <button type="submit" class="btn btn-success float-left">
                                            {{ __('static.send') }}
                                        </button>
                                    </li>
                                </form>
                            </ul>
                        </div>
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
                                <div class="row ">
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-success">{{ __('static.send') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
