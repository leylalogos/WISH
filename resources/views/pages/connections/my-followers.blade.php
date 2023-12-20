@extends('layouts.my-connection')

@section('table')
    @foreach ($followers as $follower)
        @include('partials.user-connection',[
            'connectedUser' => $follower,
            'buttons' => ['followBack', 'remove']
        ])
    @endforeach
@endsection
