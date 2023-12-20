@extends('layouts.frontend')
@section('title', 'My connections')
@section('content')
    <div class="container" style="margin-top: 60px;">
        <div class="profile">
            <div class="profile-header">
                <div class="profile-header-cover"></div>
                <div class="profile-header-content">
                    <div class="profile-header-img">
                        <img src="{{ $user->accounts->first()->avatar }}" alt="profile picture" />
                    </div>
                    <ul class="profile-header-tab nav nav-tabs nav-tabs-v2">
                        <li class="nav-item first-nav-item">
                            <a href="{{ route('connection.myFollowersIndex') }}" class="nav-link" data-toggle="tab">
                                <div class="nav-field">دنبال کننده های من</div>
                                <div class="nav-value">N/A</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('connection.myFollowingsIndex') }}" class="nav-link " data-toggle="tab">
                                <div class="nav-field">دنبال شونده ها</div>
                                <div class="nav-value">N/A</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('connection.myFrindsIndex') }}" class="nav-link" data-toggle="tab">
                                <div class="nav-field">دوستان من</div>
                                <div class="nav-value">N/A</div>
                            </a>
                        </li>
                        <!-- not related-->
                        <li class="nav-item">
                            <a href="{{ route('connection.myFriendRequestsIndex') }}" class="nav-link" data-toggle="tab">
                                <div class="nav-field">درخواست های دوستی</div>
                                <div class="nav-value">N/A</div>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="{{ route('connection.mySentRequestsIndex') }}" class="nav-link" data-toggle="tab">
                                <div class="nav-field">درخواست های ارسالی</div>
                                <div class="nav-value">N/A</div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="profile-container">
                <div class="profile-sidebar">
                    <div class="desktop-sticky-top">
                        <h4>{{ $user->name }}</h4>
                        <div class="font-weight-600 mb-3 text-muted mt-n2">{{ $user->username }}</div>

                        <hr class="mt-4 mb-4" />
                    </div>
                </div>

                <!-- connections table -->
                <div class="profile-content">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="tab-content p-0">
                                <div class="tab-pane fade active show" id="profile-followers">
                                    <div class="list-group">
                                        @yield('table')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
