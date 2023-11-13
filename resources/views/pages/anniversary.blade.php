@extends('layouts.frontend')
@section('title', 'my wish list')

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">

                        <div class="col-md-10">
                            <h4>اضافه کردن مراسم و سالگردها</h4>

                        </div>
                        <div class="col-md-2">
                            <a data-bs-target="#addAnniversaryModal" data-bs-toggle="modal" class="btn btn-success"><i
                                    class="material-icons">&#xE147;</i>
                                <span>اضافه کردن سالگرد</span></a>

                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>نوع مراسم</th>
                            <th>تاریخ مراسم</th>
                            <th>اهمیت</th>
                            <th>توضیحات</th>
                            <th>مدیریت</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anniversaries as $anniversary)
                            <tr>
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                        <label for="checkbox1"></label>
                                    </span>
                                </td>
                                <td data-val="{{ $anniversary->anniversary_type }}">
                                    {{ $anniversary->anniversaryTypeText }}</td>
                                <td>{{ $anniversary->anniversary_date }}</td>
                                <td data-val="{{ $anniversary->importance }}">{{ $anniversary->importanceText }}</td>
                                <td>{{ $anniversary->description }}</td>

                                <td>
                                    <a href="#editAnniversaryModal" class="edit" data-id="{{ $anniversary->id }}"
                                        data-bs-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                            title="Edit">&#xE254;</i></a>
                                    <a href="#deleteanniversaryModal" class="delete" data-id="{{ $anniversary->id }}"
                                        data-bs-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                            title="Delete">&#xE872;</i></a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Add Modal HTML -->
    <div id="addAnniversaryModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="post" action="{{ route('anniversary.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">اضافه کردن مراسم</h4>
                        <button type="button" class="close" data-bs-toggle="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>نوع مراسم</label>
                            <select class="form-select" aria-label="Default select example" name="anniversary_type">
                                <option value="1">تولد</option>
                                <option value="2">ازدواج</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>تاریخ مراسم</label>
                            <input data-jdp type="text" class="form-control" name="anniversary_date">
                        </div>
                        <div class="form-group">
                            <label>اهمیت مراسم</label>
                            <select class="form-select" aria-label="Default select example" name="importance">
                                <option value="3 ">خیلی زیاد</option>
                                <option value="2">زیاد</option>
                                <option value="1">متوسط</option>
                                <option value="0" selected>کم</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>توضیحات</label>

                            <textarea class="form-control" name="description" placeholder="در مورد مراسم،توضیحات بیشتر بنویسید." rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-warning" data-bs-toggle="modal" value="انصراف">
                        <input type="submit" class="btn btn-success" value="اضافه کردن">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editAnniversaryModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="post" action="{{ route('anniversary.update', ['anniversary' => 0]) }}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">ویرایش مراسم</h4>
                        <button type="button" class="close" data-bs-toggle="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>نوع مراسم</label>
                            <select class="form-select" aria-label="Default select example" name="anniversary_type">
                                <option value="1" selected>تولد</option>
                                <option value="2">ازدواج</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>تاریخ مراسم</label>
                            <input data-jdp type="text" class="form-control" name="anniversary_date">
                        </div>
                        <div class="form-group">
                            <label>اهمیت مراسم</label>
                            <select class="form-select" aria-label="Default select example" name="importance">
                                <option value="3 ">خیلی زیاد</option>
                                <option value="2">زیاد</option>
                                <option value="1">متوسط</option>
                                <option value="0" selected>کم</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>توضیحات</label>

                            <textarea class="form-control" name="description" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-warning" data-bs-toggle="modal" value="انصراف">
                        <input type="submit" class="btn btn-success" value= "ویرایش">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div id="deleteanniversaryModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="post" action="{{ route('anniversary.delete', ['anniversary' => 0]) }}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">حذف کردن مراسم</h4>
                        <button type="button" class="close" data-bs-toggle="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>آیا از حذف این مراسم اطمینان دارید؟</p>
                        <p class="text-danger"><small>امکان بازگشت این مراسم وجود ندارد.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-bs-toggle="modal" value="انصراف">
                        <input type="submit" class="btn btn-danger" value="حذف کردن">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
