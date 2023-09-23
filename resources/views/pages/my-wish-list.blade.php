@extends('layouts.frontend')
@section('title', 'my wish list')
@section('content')
    <div class="container">
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
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $wish->title }}</td>
                        <td>{{ $wish->url }}</td>
                        <td>{{ $wish->priority }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
