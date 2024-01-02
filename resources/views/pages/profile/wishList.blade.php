@extends('pages.profile.layout')
@section('profile-content')
    <div class="table-responsive shopping-cart">
        <table class="table">
            <thead>
                <tr>
                    <th>نام کادو</th>
                    <th class="text-center">قیمت</th>
                    <th class="text-center">الویت</th>
                    <th class="text-center">سوپرایز کن</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wishLists as $wish)
                    <tr>
                        <td>
                            <div class="product-item">
                                <a class="product-thumb" href="#"><img src="{{ $wish->image_url }}" alt="Product"></a>
                                <div class="product-info">
                                    <h4 class="product-title"><a href="#">{{ $wish->title }}</a></h4>
                                    <span><em>Size:</em>
                                        10.5</span><span><em>Color:</em> Dark Blue</span>
                                </div>
                            </div>
                        </td>

                        <td class="text-center text-lg text-medium">
                            {{ $wish->price ? number_format($wish->price * 1000) : '-' }}
                        </td>
                        <td class="text-center text-lg text-medium">{{ $wish->priorityText }}</td>
                        <td class="text-center">
                            <a class="btn btn-warning" href="#" data-toggle="tooltip" title=""
                                data-original-title="Remove item">رزرو کردن</a>
                            <a class="btn btn-success" href="#" data-toggle="tooltip" title=""
                                data-original-title="Remove item">خرید کردن</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
