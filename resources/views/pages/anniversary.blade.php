@extends('layouts.frontend')
@section('title', 'my wish list')

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">

                        <div class="col-md-8">
                            <h4>اضافه کردن مراسم و سالگردها</h4>

                        </div>
                        <div class="col-md-4">
                            <a data-bs-target="#addAnniversaryModal" data-bs-toggle="modal" class="btn btn-success"><i
                                    class="material-icons">&#xE147;</i>
                                <span>اضافه کردن سالگرد</span></a>
                            <a href="#deleteEmployeeModal" class="btn btn-danger"><i class="material-icons">&#xE15C;</i>
                                <span>حذف کردن</span></a>
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
                                <td>{{ $anniversary->anniversary_type }}</td>
                                <td>{{ $anniversary->anniversary_date }}</td>
                                <td>{{ $anniversary->importanceText }}</td>
                                <td>{{ $anniversary->description }}</td>

                                <td>
                                    <a href="#editAnniversaryModal" class="edit" data-id="{{ $anniversary->id }}"
                                        data-bs-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                            title="Edit">&#xE254;</i></a>
                                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i
                                            class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>نوع مراسم</label>
                            <select class="form-select" aria-label="Default select example" name="anniversary_type">
                                <option value="3 ">تولد</option>
                                <option value="2">عروسی</option>
                                <option value="1">سالگرد ازدواج</option>
                                <option value="0" selected>شیرینی</option>
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

                            <textarea class="form-control" name="description" placeholder="در مورد رنگ، سایز،جنس و غیره توضیحات بیشتر بنویس."
                                rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-warning" data-dismiss="modal" value="انصراف">
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>نوع مراسم</label>
                            <select class="form-select" aria-label="Default select example" name="anniversary_type">
                                <option value="3 ">تولد</option>
                                <option value="2">عروسی</option>
                                <option value="1">سالگرد ازدواج</option>
                                <option value="0" selected>شیرینی</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>تاریخ مراسم</label>
                            <input data-jdp type="text" class="form-control" name="anniversary_date"
                                value="{{ $anniversary->anniversary_date }}">
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

                            <textarea class="form-control" name="description" rows="5">{{ $anniversary->description }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-warning" data-dismiss="modal" value="انصراف">
                        <input type="submit" class="btn btn-success" value= "ویرایش">
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div> --}}
    <!-- Delete Modal HTML -->
    {{-- <div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div> --}}

@endsection
