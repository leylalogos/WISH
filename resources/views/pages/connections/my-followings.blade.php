@extends('layouts.my-connection')

@section('table')
    @foreach ($followings as $following)
        @include('partials.user-connection',[
            'connectedUser' => $following,
            'buttons' => ['unfollow']
        ])
    @endforeach
@endsection
