@extends('layouts.frontend')
@section('title', 'My connections')
@section('content')

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <div class="container">
        <ol class="list-unstyled mt-5">
            <li style="font-size: 13px;"><span class="text-primary text-medium ">۱.</span>
                سالگرد برای مراسم هایی است که هر سال تکرار می شود مثل:تولد، سالگرد ازدواج یا غیره
            </li>
            <li style="font-size: 13px;"><span class="text-primary text-medium">۲. </span>
                وقایع برای مراسم هایی است که در سال یکبار تکرار میشود مثل:فارغ التحصیلی، سخنرانی، جشن دندان یا غیره
            </li>

        </ol>
        <div class="row  mt-5 profile-header-tab nav nav-tabs nav-tabs-v2">
            <div class="col-5 dlt">
                <a href="{{ route('anniversary.index') }}" class="nav-link" data-toggle="tab">
                    <div class="nav-field">سالگردها</div>
                    <div class="nav-value">N/A</div>
                </a>
            </div>
            <div class="col-5 dlt">
                <a href="{{ route('event.index') }}" class="nav-link" data-toggle="tab">
                    <div class="nav-field"> وقایع و ایونت ها</div>
                    <div class="nav-value">N/A</div>
                </a>
            </div>
            <div class="col-2">
                <a href="#editModal" data-bs-toggle="modal" class="btn add-form-btn"
                    style="width: 100%;
                        height:100%;
                        background:#ED5EDD;
                        color:white;">
                    <div class="nav-field" style="margin-top: 12px; ">اضافه کردن</div>
                </a>
            </div>
        </div>

        @yield('anniversary-event')

    </div>

@endsection
