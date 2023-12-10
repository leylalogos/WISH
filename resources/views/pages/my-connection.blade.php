@extends('layouts.frontend')
@section('title', 'Find people')
@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4" style="background: whitesmoke">
                    <ol class="breadcrumb mb-0 ">
                        <li class="breadcrumb-item active" aria-current="page">
                            <h5 style="font-weight: bold;">
                                درخواست های دوستی
                            </h5>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="friend-list leyla-auto-scroll row " style="overflow: auto;flex-wrap:nowrap">
            @foreach ($followedRequestUsers as $user)
                <div class="col-md-4 col-sm-6">
                    <div class="friend-card">
                        <div style="background: #e1d6ea; width:400px; height:100px;">
                        </div>
                        <div class="card-info">
                            <img src="{{ $user->accounts->first()->avatar }}" alt="user" class="profile-photo-lg">
                            <div class="friend-info">
                                <h5><a href="timeline.html" class="profile-link">{{ $user->username }}</a></h5>


                            </div>
                            <div class="row justify-content-center mt-2">
                                <div class="col-12">
                                    <form class="form-inline"
                                        action="{{ route('connection.follow', ['user_id' => $user->id]) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-light btn-friend" style="background: green; color:white;">
                                            دوستی متقابل
                                        </button>
                                    </form>
                                    <form class="form-inline" method="POST"
                                        action="{{ route('connection.approve', ['user_id' => $user->id]) }}">
                                        @csrf

                                        <button class="btn btn-light btn-friend"
                                            style="background: #8dc63f; color:white;">قبول
                                            کردن</button>
                                    </form>
                                    <form class="form-inline"
                                        action="{{ route('connection.reject', ['user_id' => $user->id]) }}" method="post">
                                        @csrf
                                        <button class="btn btn-light btn-friend"
                                            style="background: #fa625e; color:white;">رد
                                            درخواست</button>
                                    </form>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            @endforeach




        </div>
    </div>
@endsection
