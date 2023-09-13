@extends('layouts.frontend')
@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">

                            <li class="breadcrumb-item active" aria-current="page">پروفایل من</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ $user->name }}</h5>

                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <p class="mb-0">https://mdbootstrap.com</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('update.profile') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">نام</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class=" form-control text-muted mb-0" name="name" type="text"
                                            value="{{ $user->name }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">ایمیل</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class=" form-control text-muted mb-0" type="text" name="email"
                                            value="{{ $user->email }}" disabled>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">تاریخ تولد</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="text-muted mb-0 form-control" type="date" name="birthday"
                                            value="{{ $user->birthday }}">
                                    </div>
                                </div>
                                <hr>
                                <div class=" mt-3">
                                    <button type="submit" class="btn btn-primary ">ارسال</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
