@extends('layouts.frontend')
@section('content')
    <div class="container col-5" style="text-align: initial;">
        <div class="card mt-5">
            <div class="card-header">
                <h4>اطلاعات کاربری</h1>
            </div>
            <div class="card-body">
                <div class="form-group">
                    @auth
                        <form action="{{ route('update.profile') }}" method="post">
                            @csrf
                            <div>
                                <img src="{{ $user->avatar }}" alt="{{ $user->name }}">
                            </div>
                            <div class="mt-3">
                                <label for="name">نام</label>
                                <input name="name" type="text" class="form-control" value="{{ $user->name }}">
                            </div>
                            <div class="mt-3">
                                <label for="name">تاریخ تولد</label>
                                <input type="date" value="{{ $user->birthday }}" id="birthday" name="birthday"
                                    class="form-control">
                            </div>
                            <div class=" mt-3">
                                <button type="submit" class="btn btn-primary ">Submit</button>
                            </div>



                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
