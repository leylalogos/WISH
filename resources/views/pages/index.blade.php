@extends('layouts.frontend')

@section('content')

<div class="index-card"  style="margin-top:0px;">
        <div class="text-center mt-5">
            <h1> {{__('static.slogan')}} </h1>
            <button class="btn btn-outline-warning mt-5">
                {{__('static.start creating my wish list')}}
            </button>
        </div>
    </div>
<div class="container">

    <div class="index-card">
        <div class="text-center mt-5">
            <h1> {{__('static.goal')}} </h1>
        </div>
        <div class="text-center static-text">
            {!!nl2br(__('texts.about'))!!}
        </div>
    </div>
    <div class="index-card">
    <div class="text-center mt-5">
            {{__('static.invite to login')}}
        </div>
        <div class="text-center mt-5">
            Login/Sigup with Google
        </div>
    </div>
</div>
@endsection
