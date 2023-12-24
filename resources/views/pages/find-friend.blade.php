@extends('layouts.frontend')
@section('title', 'Find people')
@section('content')

    <div class="container mt-2">
        <br />
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-6">
                <form class="card card-sm">
                    <div class="card-body row no-gutters align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-search h4 text-body"></i>
                        </div>
                        <!--end of col-->
                        <div class="col">
                            <input class="form-control form-control-lg form-control-borderless" type="search"
                                placeholder="نام کاربری یا ایمیل وارد کن.">
                        </div>
                        <!--end of col-->
                        <div class="col-auto">
                            <button type="button" class="btn btn-section ">
                                جستجو</button>
                        </div>
                        <!--end of col-->
                    </div>
                </form>
            </div>
            <!--end of col-->
        </div>
        @if ($suggestions)
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0 ">
                            <li class="breadcrumb-item active" aria-current="page"> افراد پیشنهاد شده</li>
                        </ol>
                    </nav>
                </div>
            </div>
            @include('partials.connection-suggestions', ['suggestions' => $suggestions])
        @endif

    </div>

@endsection
