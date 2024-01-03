@extends('layouts.frontend')
@section('title', 'Find people')
@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3">
                <div class="osahan-account-page-left shadow-sm bg-white h-100">
                    <div class="border-bottom p-4">
                        <div class="osahan-user text-center">
                            <div class="osahan-user-media">
                                <img class="mb-3 rounded-pill shadow-sm mt-1" src="{{ $user->avatar }}"
                                    alt="gurdeep singh osahan">
                                <div class="osahan-user-media-body">
                                    <h6 class="mb-2">{{ $user->username }}</h6>
                                    <p class="mb-1">{{ $user->name }}</p>

                                    <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3"
                                            data-toggle="modal" data-target="#edit-profile-modal"
                                            href="{{ route('account.setting') }}"><i class="icofont-ui-edit"></i> ویرایش
                                            اطلاعات کاربری</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-9">
                <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane  fade  active show" id="orders" role="tabpanel"
                            aria-labelledby="orders-tab">
                            <h4 class="font-weight-bold mt-0 mb-4">مراسم و ساگردها</h4>
                            @foreach ($events as $event)
                                <div class="bg-white card mb-4 order-list shadow-sm"
                                    style="border: 1px solid rgba(0,0,0,.125);
                                 border-radius: .25rem;">
                                    <div class="gold-members p-4">
                                        <a href="#">
                                        </a>
                                        <div class="media">
                                            <a href="#">
                                                <img class="mr-4" src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                    alt="Generic placeholder image">
                                            </a>
                                            <div class="media-body">
                                                <a href="#">
                                                    <span class="text-info">تاریخ مراسم {{ $event->jalaliDate }}<i
                                                            class="icofont-check-circled text-success"></i></span>
                                                </a>
                                                <h6 class="mb-2">
                                                    <a href="#"></a>
                                                    <a href="#" class="text-black">{{ $event->title }}</a>
                                                </h6>
                                                <p class="text-gray mb-3">
                                                    نام کاربر: {{ $event->user->username }}
                                                </p>
                                                <p class="text-gray mb-3">
                                                    الویت: {{ $event->importanceText }}
                                                </p>
                                                <p class="text-dark">
                                                    {{ $event->description }}
                                                </p>
                                                <hr>
                                                <div class="float-right" style="float: left;">
                                                    <a class="btn btn-sm btn-outline-primary" href="#"><i
                                                            class="icofont-headphone-alt"></i> نشان نده</a>
                                                    <a class="btn btn-sm btn-primary"
                                                        href="{{ route('profile', ['user_id' => $event->user_id]) }}"><i
                                                            class="icofont-refresh"></i> مشاهده پروفایل</a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
