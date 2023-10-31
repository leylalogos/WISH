@extends('layouts.frontend')
@section('title', 'my wish list')
@section('content')


    <div class="container padding-bottom-3x mb-2 mt-5">
        <div class="row justify-content-center " id="url-box">
            <div class="col-lg-8 col-md-10 mt-3">
                <h5>
                    آدرس سایتی که کالا موجود هست رو اضافه کن.
                </h5>
                <ol class="list-unstyled mt-3">
                    <li><span class="text-primary text-medium">۱. </span>آدرس را به صورت معتبر وارد کنید.</li>
                    <li><span class="text-primary text-medium">۲. </span>برای اعتبار سنجی آدرس، کمی صبر کنید.</li>
                    <li><span class="text-primary text-medium">۳. </span>آدرس نمی تواند خالی باشد.</li>

                </ol>
                <form class="card  mb-5">
                    <div class="card-body">
                        <div class="form-group" style="padding: 55px;">
                            <label>آدرس وبسایت رو وارد کن</label>
                            <input id ="url-input" class="form-control" type="text" required="">

                        </div>
                    </div>
                    <div class="card-footer">
                        @include('partials.row-button-end', [
                            'id' => 'url-added-btn',
                            'text' =>
                                '<span id="url-added-btn-spin" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display:none;"></span>' .
                                __('static.send'),
                        ])
                    </div>
                </form>
            </div>
        </div>

        <div class="row justify-content-center mt-5" id="product-detail" style="display: none;">
            <div class="col-12 ">
                <div class="card mb-4">
                    <div class="card-header">
                        @include('partials.row-button-end', [
                            'id' => 'url-add-back',
                            'text' => 'بازگشت',
                        ])
                    </div>
                    <div class="card-body">
                        @if ($errors->all())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li> {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('wishlist.store') }}" method="post" class="needs-validation" novalidate>
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <input type="hidden" name="image_url" id="image_url">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-4 col-xs-6">
                                            <label class="form-label">
                                                تصویر کالا
                                            </label>
                                            <div class="relative">
                                                <img src="https://www.bootdey.com/image/400x260/D3D3D3/000000"
                                                    class="img-responsive" id="product-image">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group md-form mt-3 ">
                                        <label class="form-label">
                                            {{ __('static.gift-name') }}
                                        </label>
                                        <input id = "product-title" type="text" required="required"
                                            class="form-control validate" name="title">
                                    </div>

                                    <div class="form-group md-form mt-3">
                                        <label class="form-label">
                                            قیمت</label>
                                        <div class="input-group" dir="ltr">
                                            <input type="number" min="0" step="1000" class="form-control"
                                                name="price">
                                            <div class="input-group-append">
                                                <span class="input-group-text" style="height: 100%;">IRR</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group md-form mt-3">

                                        <label class="form-label">{{ __('static.gift_url_website') }}</label>
                                        <span id="product-url-show"></span>
                                        <input id ="product-url" type="hidden" required="required"
                                            class="form-control validate" name="url">
                                    </div>
                                    <div class="form-group md-form mt-3">
                                        <label class="form-label">
                                            {{ __('static.priority') }}</label>
                                        <select class="form-control mb-3" name="priority">
                                            <option value="3 ">خیلی مهم</option>
                                            <option value="2"> مهم</option>
                                            <option value="1">متوسط</option>
                                            <option value="0" selected>کم</option>
                                        </select>
                                    </div>
                                    <div class="form-group md-form mt-3">
                                        <label class="form-label">توضیحات</label>
                                        <textarea id="product-description" class="form-control" id="text" name="description"
                                            placeholder="در مورد رنگ، سایز،جنس و غیره توضیحات بیشتر بنویس." rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        @include('partials.row-button-end', [
                            'id' => 'url-added-btn',
                            'text' => __('static.add'),
                        ])
                    </div>
                    </form>
                </div>
            </div>
        </div>

        </section>
    @endsection
