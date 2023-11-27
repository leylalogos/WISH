@extends('layouts.frontend')
@section('title', 'Verification Code')
@section('content')
    <div class="row justify-content-center mt-7" dir="ltr">
        <div class="col-lg-4 text-center">
            <div class="card mt-5">
                <form onsubmit="onSubmit(event)" class="content-area" method="post" action="{{ route('verification.code') }}">
                    @csrf
                    <div class="card-body py-5 px-lg-5">
                        <i class="fa-regular fa-lock  fa-2xl" style="font-size: 3.2em; color:#e6109e;"></i>
                        <h3 class="fw-normal  mt-4">
                            تایید شماره موبایل
                        </h3>
                        <p class="mt-4 mb-1">
                            ما کد تایید را به شماره شما ارسال کردیم
                        </p>
                        <p>
                            لطفا کد فرستاده شده را در زیر وارد کنید
                        </p>
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <div class="row mt-4 pt-2 ">
                            <div class="col">
                                <input type="text" class="code-input form-control form-control-lg text-center py-4 "
                                    maxlength="1" autofocus="" name="code1">
                            </div>
                            <div class="col">
                                <input type="text" class="code-input form-control form-control-lg text-center py-4 "
                                    maxlength="1" name="code2">
                            </div>
                            <div class="col">
                                <input type="text" class="code-input form-control form-control-lg text-center py-4 "
                                    maxlength="1" name="code3">
                            </div>
                            <div class="col">
                                <input type="text" class="code-input form-control form-control-lg text-center py-4 "
                                    maxlength="1" name="code4">
                            </div>
                        </div>


                        <button class="btn btn-purple btn-lg w-100 hover-lift-light mt-4">
                            ورود به حساب کاربری
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
