@extends('layouts.my-connection')

@section('table')
    <div class="profile-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="tab-content p-0">
                    <div class="tab-pane fade active show" id="profile-followers">
                        <div class="list-group">
                            @foreach ($followings as $following)
                                <div class="list-group-item d-flex align-items-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt=""
                                        width="50px" class="rounded-sm ml-n2" />
                                    <div class="flex-fill pl-3 pr-3">
                                        <div><a href="#" class="text-dark font-weight-600">{{ $following->name }}</a>
                                        </div>
                                        <div class="text-muted fs-13px">{{ $following->username }}</div>
                                    </div>
                                    <form method="POST"
                                        action="{{ route('connection.unfollow', ['user_id' => $following->id]) }}">
                                        @csrf
                                        <button class="btn btn-light btn-friend" style="background: #fa625e; color:white;">
                                            دنبال نکردن
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
