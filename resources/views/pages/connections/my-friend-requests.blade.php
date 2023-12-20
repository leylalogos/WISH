@extends('layouts.my-connection')

@section('table')
    <div class="profile-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="tab-content p-0">
                    <div class="tab-pane fade active show" id="profile-followers">
                        <div class="list-group">
                            @foreach ($friendRequests as $friendRequest)
                                <div class="list-group-item d-flex align-items-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""
                                        width="50px" class="rounded-sm ml-n2" />
                                    <div class="flex-fill pl-3 pr-3">
                                        <div><a href="#"
                                                class="text-dark font-weight-600">{{ $friendRequest->name }}</a>
                                        </div>
                                        <div class="text-muted fs-13px">{{ $friendRequest->username }}</div>
                                    </div>
                                    <form class="form-inline"
                                        action="{{ route('connection.followBack', ['user_id' => $friendRequest->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button class="btn btn-light btn-friend" style="background: green; color:white;">
                                            دوستی متقابل
                                        </button>
                                    </form>
                                    <form class="form-inline" method="POST"
                                        action="{{ route('connection.approve', ['user_id' => $friendRequest->id]) }}">
                                        @csrf

                                        <button class="btn btn-light btn-friend"
                                            style="background: #8dc63f; color:white;">قبول
                                            کردن</button>
                                    </form>
                                    <form class="form-inline"
                                        action="{{ route('connection.reject', ['user_id' => $friendRequest->id]) }}"
                                        method="post">
                                        @csrf
                                        <button class="btn btn-light btn-friend"
                                            style="background: #fa625e; color:white;">رد
                                            درخواست</button>
                                    </form>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container">

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
    </div> --}}
@endsection
