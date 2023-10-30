@extends('layouts.frontend')
@section('title', 'my wish list')
@section('content')


    <div class="container padding-bottom-3x mb-2 mt-5">
        <div class="row justify-content-center" id="url-box">
            <div class="col-lg-8 col-md-10">
                <p>
                    تو این قسمت آدرس سایتی که کالا موجود هست رو اضافه کن.
                </p>
                <form class="card mt-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label>آدرس وبسایت رو وارد کن</label>
                            <input id ="url-input" class="form-control" type="text" required="">
                            <small class="form-text text-muted">
                                لطفا آدرس معتبر وارد کنید.
                            </small>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-end">
                            <div class="col-4 col-md-3">
                                <button id="url-added-btn" class="btn btn-section" type="submit">
                                    <span id="url-added-btn-spin" class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true" style="visibility: hidden;"></span>
                                    اضافه کردن </button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row justify-content-center mt-5" id="product-detail" style="display: none;">
            <div class="col-10 ">
                <div class="card mb-4">
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
                        <form action="{{ route('create.wishList') }}" method="post" class="needs-validation" novalidate>
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <input type="hidden" name="image_url" id="image_url">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-4 col-xs-6">
                                            <label class="form-label">عکس </label>
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
                                                <span class="input-group-text">IRR</span>
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
                                            <option value="" disabled selected>اهمیت کادو رو مشخص کن.</option>
                                            <option value="3 ">خیلی مهم</option>
                                            <option value="2"> مهم</option>
                                            <option value="1">متوسط</option>
                                            <option value="0">کم</option>
                                        </select>
                                    </div>
                                    <div class="form-group md-form mt-3">
                                        <label class="form-label">توضیحات</label>
                                        <textarea id="product-description" class="form-control" id="text" name="description"
                                            placeholder="در مورد این کالا توضیحات بیشتر بنویس. اعم از رنگ،سایز،جنس کالا" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>


                    <div class="card-footer">
                        <div class="row justify-content-end">
                            <div class="col-4 col-md-3">
                                <button type="submit" class="btn btn-section" type="button">
                                    {{ __('static.add') }}
                                </button>
                            </div>
                        </div>
                    </div>



                    </form>
                </div>
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
