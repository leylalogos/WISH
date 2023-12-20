@extends('layouts.my-connection')

@section('table')
    <div class="profile-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="tab-content p-0">
                    <div class="tab-pane fade active show" id="profile-followers">
                        <div class="list-group">
                            @foreach ($friends as $friend)
                                @include('partials.user-connection',[
                                    'connectedUser' => $friend,
                                    'buttons' => [
                                        [
                                            'routeName' => 'connection.unfollow',
                                            'text' => 'دنبال نکردن',
                                            'style' => 'background: #fa625e; color:white;'
                                        ]
                                        [
                                            'routeName' => 'connection.remove',
                                            'text' => 'پایان رابطه',
                                            'style' => 'background: #000000; color:white;'
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
