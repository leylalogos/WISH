@extends('layouts.my-connection')

@section('table')
    @foreach ($friends as $friend)
        @include('partials.user-connection',[
            'connectedUser' => $friend,
            'buttons' => ['unfollow', 'remove']
        ])
    @endforeach
@endsection
