@extends('layouts.my-connection')

@section('table')
    @foreach ($friendRequests as $friendRequest)
        @include('partials.user-connection', [
            'connectedUser' => $friendRequest,
            'buttons' => ['followBack', 'approve', 'reject'],
        ])
    @endforeach
@endsection
