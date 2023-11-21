@extends('layouts.frontend')
@section('title', 'My wish list')
@section('content')




    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered sortable">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 text-uppercase font-medium pl-4">عکس کالا</th>
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
                                    <th scope="col" class="border-0 text-uppercase font-medium">مدیریت</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($wishLists as $wish)
                                    <tr>
                                        <td>
                                            <img src="{{ $wish->image_url }}" alt="">
                                        </td>

                                        <td>
                                            <a href="{{ $wish->url }}">{{ $wish->title }}
                                            </a>
                                        </td>

                                        <td data-sort-value="{{ $wish->price }}">
                                            {{ $wish->price ? number_format($wish->price * 1000) : '-' }}
                                        </td>
                                        <td data-sort-value="{{ $wish->priority }}">{{ $wish->priorityText }}</td>
                                        <td>

                                            <button type="button"
                                                class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i
                                                    class="fa fa-trash"></i> </button>
                                            <button type="button"
                                                class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i
                                                    class="fa fa-edit"></i> </button>
                                            <button type="button"
                                                class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i
                                                    class="fa fa-upload"></i> </button>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>








    {{-- <div class="row justify-content-center">
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
    </div> --}}
@endsection
