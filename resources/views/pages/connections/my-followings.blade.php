@extends('layouts.my-connection')

@section('table')
    <div class="profile-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="tab-content p-0">
                    <div class="tab-pane fade active show" id="profile-followers">
                        <div class="list-group">
                            @foreach ($followings as $following)
                                @include('partials.user-connection',[
                                    'connectedUser' => $following,
                                    'buttons' => [
                                        [
                                            'routeName' => 'connection.unfollow',
                                            'text' => 'دنبال نکردن',
                                            'style' => 'background: #fa625e; color:white;'
                                        ]
                                    ]
                                ])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
