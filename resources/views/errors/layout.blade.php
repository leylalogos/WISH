@extends('layouts.frontend')
@section('title', 'Error')

@section('content')
    <div class="container" style="margin-top: 40px;">
        <div class="row justify-content-center">
            <div class="col-4">
                <img src="{{ url('frontend/images/error.png') }}" alt="error picture">
            </div>
            <div class="col-5" style="margin-top: 130px;">
                <div class="row">
                    <div class="col-12">
                        <h4>
                            @yield('message')
                        </h4>
                        <br>
                        <p>
                            @yield('exception', '')
                        </p>
                        <br>
                        <a href="{{ route('index') }}" class="btn btn-warning">بازگشت به صفحه اصلی</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
