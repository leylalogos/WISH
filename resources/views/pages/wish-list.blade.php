@extends('layouts.frontend')
@section('title', 'Add wish list')
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
                                <input type="text" required="required" class="form-control validate" name="url">
                            </div>
                            <label data-error="wrong" data-success="right" class="font-weight-bold">
                                {{ __('static.priority') }}</label>
                            <select class="form-control mb-3" name="priority">
                                <option value="خیلی مهم">خیلی مهم</option>
                                <option value="مهم"> مهم</option>
                                <option value="متوسط">متوسط</option>
                                <option value="کم">کم</option>
                            </select>
                            <button type="submit" class="btn btn-success float-left" type="button">
                                {{ __('static.add') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
