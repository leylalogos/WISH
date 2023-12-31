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


                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-4 col-xs-12">
                                    <div class="social-timeline-left">
                                        <div class="card">
                                            <div class="social-profile">
                                                <img class="img-fluid width-100" src="{{ $user->avatar }}" alt="">
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
                                                <a class="nav-link active" data-toggle="tab" href="#about"
                                                    role="tab">لیست آرزوها</a>
                                                <div class="slide"></div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#photos" role="tab">مراسم
                                                    ها</a>
                                                <div class="slide"></div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#friends" role="tab">اطلاعات
                                                    شخصی</a>
                                                <div class="slide"></div>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
@endsection
