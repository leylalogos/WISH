@extends('layouts.frontend')
@section('title', 'Profile')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12">
                <div>
                    <div class="content social-timeline">
                        <div class="">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="social-wallpaper">
                                        <div class="profile-hvr">
                                            <i class="icofont icofont-ui-edit p-r-10"></i>
                                            <i class="icofont icofont-ui-delete"></i>
                                        </div>
                                    </div>

                                    <div class="timeline-btn">
                                        <a href="#" class="btn btn-primary waves-effect waves-light m-r-10">دنبال
                                            کردن</a>
                                        <a href="#" class="btn btn-primary waves-effect waves-light">
                                            ارسال پیام
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-4 col-xs-12">
                                    <div class="social-timeline-left">
                                        <div class="card">
                                            <div class="social-profile">
                                                <img class="img-fluid width-100" src="{{ $user->avatar }}" alt=""
                                                    style="width: 100%; height:100%;">
                                                <div class="profile-hvr m-t-15">
                                                    <i class="icofont icofont-ui-edit p-r-10"></i>
                                                    <i class="icofont icofont-ui-delete"></i>
                                                </div>
                                            </div>
                                            <div class="card-block social-follower">
                                                <h4>{{ $user->username }}</h4>
                                                <h5>{{ $user->name }}</h5>

                                                <div class="">
                                                    <button type="button"
                                                        class="btn btn-outline-primary waves-effect btn-block"><i
                                                            class="icofont icofont-ui-user m-r-10"></i> Add as
                                                        Friend</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-xl-9 col-lg-8 col-md-8 col-xs-12 ">

                                    <div class="card social-tabs">
                                        <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist">

                                            <li class="nav-item">
                                                <a class="nav-link " data-toggle="tab"
                                                    href="{{ route('profile', ['user_id' => $user->id, 'section' => 'wishList']) }}"
                                                    role="tab">لیست
                                                    آرزوها</a>
                                                <div class="slide"></div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab"
                                                    href="{{ route('profile', ['user_id' => $user->id, 'section' => 'event']) }}"
                                                    role="tab">مراسم
                                                    ها</a>
                                                <div class="slide"></div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab"
                                                    href="{{ route('profile', ['user_id' => $user->id, 'section' => 'basicInformation']) }}"
                                                    role="tab">اطلاعات
                                                    شخصی</a>
                                                <div class="slide"></div>
                                            </li>
                                        </ul>
                                    </div>
                                    @yield('profile-content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
