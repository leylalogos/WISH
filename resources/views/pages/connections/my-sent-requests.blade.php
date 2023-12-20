@extends('layouts.my-connection')

@section('table')
    @foreach ($sentRequests as $sentRequest)
        @include('partials.user-connection',[
            'connectedUser' => $sentRequest,
            'buttons' => []
        ])
    @endforeach
@endsection
