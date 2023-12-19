@extends('layouts.my-connection')

@section('table')
    <div class="profile-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="tab-content p-0">
                    <div class="tab-pane fade active show" id="profile-followers">
                        <div class="list-group">
                            @foreach ($followers as $follower)
                                <div class="list-group-item d-flex align-items-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""
                                        width="50px" class="rounded-sm ml-n2" />
                                    <div class="flex-fill pl-3 pr-3">
                                        <div><a href="#" class="text-dark font-weight-600">{{ $follower->name }}</a>
                                        </div>
                                        <div class="text-muted fs-13px">{{ $follower->username }}</div>
                                    </div>
                                    <button class="btn btn-light btn-friend" style="background: #8dc63f; color:white;">
                                        دنبال کردن
                                    </button>
                                    <button class="btn btn-light btn-friend" style="background: #fa625e; color:white;">
                                        دنبال نکردن
                                    </button>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
