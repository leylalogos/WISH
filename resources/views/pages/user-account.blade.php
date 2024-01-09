@extends('layouts.frontend')
@section('title', 'account | ' . $user->name)
@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0 ">
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
                            <div class="row justify-content-center">
                                <div class="col-4">
                                    <a href="{{ route('contacts.index') }}" class="btn"
                                        style="float: left; background:rgb(248, 6, 204); color:white;">مخاطبین
                                        من</a>
                                </div>
                            </div>
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
                    @php
                        $accounts = $user->accounts->pluck('last_login', 'provider')->toArray();
                    @endphp
                    <div class="row mt-2 justify-content-center">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    @include('layouts.inc.addAccountBtn', [
                                        'brandName' => 'افزودن اکانت گوگل ',
                                        'svg' =>
                                            '<i class="fa-brands fa-google" style="font-size: 20px; color:#d71414; margin-left:5px;"></i>',
                                        'loginUrl' => route('login.redirect', ['provider' => 'google']),
                                        'hasAccount' => isset($accounts['google']),
                                        'btnText' => isset($accounts['google']) ? 'آپدیت' : 'افزودن',
                                    ])
                                    @include('layouts.inc.addAccountBtn', [
                                        'brandName' => ' افزودن اکانت فیسبوک',
                                        'svg' =>
                                            '<i class="fa-brands fa-facebook" style="font-size: 20px; color:#555593; margin-left:5px; "></i>',
                                        'loginUrl' => route('login.redirect', ['provider' => 'facebook']),
                                        'hasAccount' => isset($accounts['facebook']),
                                        'btnText' => isset($accounts['facebook']) ? 'آپدیت' : 'افزودن',
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="div mt-4"></div>
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

                            <form id="profile-update-form" action="{{ route('account.setting.update') }}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <label class="col-sm-3">{{ __('static.name') }}</label>

                                    <div class="col-sm-9">
                                        <input class="form-control mb-0" name="name" type="text"
                                            placeholder="{{ $user->name }}">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <label class="col-sm-3">{{ __('static.username') }}</label>

                                    <div class="col-sm-9">
                                        <input class=" form-control  mb-0" name="username" type="text"
                                            placeholder="{{ $user->username }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <label class="col-sm-3">{{ __('static.phone_number') }}</label>
                                    <div class="col-sm-9">
                                        <input class=" form-control  mb-0" type="tel" name="phone_number"
                                            placeholder="{{ $user->phone_number }}">
                                    </div>
                                </div>
                                <hr>
                                @include('partials.row-button-end', ['text' => __('static.send')])
                            </form>

                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            تنظیمات
                        </div>
                        <div class="card-body">
                            <form action="{{ route('reminder') }}" method="post">
                                @csrf
                                <label for="">
                                    <h6 style="color:#555593;">مراسم و ایونت ها چه زمانی برای من گزارش شود.</h6>
                                </label>
                                <div class="form-check form-switch">
                                    <input name="1" class="form-check-input" type="checkbox"
                                        id="flexSwitchCheckDefault" {{ in_array(1, $reminders) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexSwitchCheckDefault">
                                        یک روز مانده به مراسم و ایونت گزارش شود.
                                    </label>
                                </div>
                                <div class="form-check form-switch">
                                    <input name="3" class="form-check-input" type="checkbox"
                                        id="flexSwitchCheckChecked" {{ in_array(3, $reminders) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexSwitchCheckChecked">
                                        سه روز مانده به مراسم و ایونت گزارش شود.
                                    </label>
                                </div>
                                <div class="form-check form-switch">
                                    <input name="14" class="form-check-input" type="checkbox"
                                        id="flexSwitchCheckDisabled" {{ in_array(14, $reminders) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexSwitchCheckDisabled">
                                        دو هفته مانده به مراسم و ایونت گزارش شود.
                                    </label>
                                </div>
                                <div class="form-check form-switch">
                                    <input name="60" class="form-check-input " type="checkbox"
                                        id="flexSwitchCheckCheckedDisabled"
                                        {{ in_array(60, $reminders) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">
                                        دو ماه مانده به مراسم و ایونت گزارش شود.</label>
                                </div>
                                @include('partials.row-button-end', ['text' => __('static.send')])

                            </form>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
