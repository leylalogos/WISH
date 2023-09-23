@extends('layouts.frontend')
@section('title', 'my wish list')
@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-body mb-4">
                <h2 class="text-center font-weight-bold pt-4 pb-5">
                    <strong>{{ __('static.add_gift') }}</strong>
                </h2>
                <p>
                    <strong>
                        {{ __('static.add_your_wish_list') }}
                    </strong>
                </p>
                <hr class="my-5">
                <div class="error">
                    @isset($errors)
                        @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span>
                        @endforeach
                    @endisset
                </div>
                <form action="{{ route('create.wishList') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group md-form">
                                <label data-error="wrong" data-success="right" class="font-weight-bold">
                                    {{ __('static.gift-name') }}
                                </label>
                                <input type="text" required="required" class="form-control validate" name="title">
                            </div>
                            <div class="form-group md-form mt-3">
                                <label data-error="wrong" data-success="right"
                                    class="font-weight-bold">{{ __('static.gift_url_website') }}</label>
                                <input type="url" required="required" class="form-control validate" name="url">
                            </div>
                            <label data-error="wrong" data-success="right" class="font-weight-bold">
                                {{ __('static.priority') }}</label>
                            <select class="form-control mb-3" name="priority">
                                <option value="" disabled selected>اهمیت کادو رو مشخص کن.</option>
                                <option value="3 ">خیلی مهم</option>
                                <option value="2"> مهم</option>
                                <option value="1">متوسط</option>
                                <option value="0">کم</option>
                            </select>
                            <button type="submit" class="btn btn-success float-left" type="button">
                                {{ __('static.add') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table class="table mt-5">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ردیف</th>
                    <th scope="col">نام کادو</th>
                    <th scope="col">لینک کادو</th>
                    <th scope="col">الویت</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wishLists as $wish)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $wish->title }}</td>
                        <td>{{ $wish->url }}</td>
                        <td>{{ $wish->priorityText }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
