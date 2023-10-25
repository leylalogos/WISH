@extends('layouts.frontend')
@section('title', 'my wish list')
@section('content')
    <div class="container">
        <div class=" mt-5">
            <div class="mb-4">

                <ul class="list-group list-group-flush rounded-3">
                    <h2 class="text-center font-weight-bold pt-4 pb-5">
                        <strong>{{ __('static.add_gift') }}</strong>
                    </h2>

                    <hr class="my-5">
                    @if ($errors->all())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('create.wishList') }}" method="post" class="needs-validation" novalidate>
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-9">
                                <div class="form-group md-form ">
                                    <label class="form-label">
                                        {{ __('static.gift-name') }}
                                    </label>
                                    <input type="text" required="required" class="form-control validate" name="title">
                                </div>

                                <div class="form-group md-form mt-3">
                                    <label class="form-label">
                                        قیمت</label>
                                    <div class="input-group" dir="ltr">
                                        <input type="number" min="0" step="1000" class="form-control"
                                            name="price">
                                        <div class="input-group-append">
                                            <span class="input-group-text">IRR</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group md-form mt-3">
                                    <label class="form-label">{{ __('static.gift_url_website') }}</label>
                                    <input type="url" required="required" class="form-control validate" name="url">
                                </div>
                                <div class="form-group md-form mt-3">
                                    <label class="form-label">
                                        {{ __('static.priority') }}</label>
                                    <select class="form-control mb-3" name="priority">
                                        <option value="" disabled selected>اهمیت کادو رو مشخص کن.</option>
                                        <option value="3 ">خیلی مهم</option>
                                        <option value="2"> مهم</option>
                                        <option value="1">متوسط</option>
                                        <option value="0">کم</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success" type="button">
                                    {{ __('static.add') }}
                                </button>
                            </div>
                    </form>
                </ul>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <table class="table table-striped table-bordered sortable mt-4">
                    <thead class="thead-dark">
                        <tr>
                            <th>
                                <button>
                                    نام کادو
                                </button>
                            </th>
                            <th aria-sort="ascending">
                                <button>
                                    قیمت(ریال)
                                    <span aria-hidden="true"></span>
                                </button>
                            </th>
                            <th aria-sort="descending">
                                <button>
                                    الویت
                                    <span aria-hidden="true"></span>
                                </button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wishLists as $wish)
                            <tr>
                                <td><a href="{{ $wish->url }}">{{ $wish->title }}</a></td>
                                <td data-sort-value="{{ $wish->price }}">
                                    {{ $wish->price ? number_format($wish->price * 1000) : '-' }}</td>
                                <td data-sort-value="{{ $wish->priority }}">{{ $wish->priorityText }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </section>
@endsection
