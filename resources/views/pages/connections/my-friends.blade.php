@extends('layouts.my-connection')

@section('table')
    <div class="profile-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="tab-content p-0">
                    <div class="tab-pane fade active show" id="profile-followers">
                        <div class="list-group">
                            @foreach ($friends as $friend)
                                <div class="list-group-item d-flex align-items-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt=""
                                        width="50px" class="rounded-sm ml-n2" />
                                    <div class="flex-fill pl-3 pr-3">
                                        <div><a href="#" class="text-dark font-weight-600">{{ $friend->name }}</a>
                                        </div>
                                        <div class="text-muted fs-13px">{{ $friend->username }}</div>
                                    </div>
                                    <button class="btn btn-light btn-friend" style="background: #fa625e; color:white;">
                                        دنبال نکردن
                                    </button>
                                    <button class="btn btn-light btn-friend" style="background: #fa625e; color:white;">
                                        پایان دوستی
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
