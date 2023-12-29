@extends('pages.anniversary-event.layout')
@section('anniversary-event')
    <div class="event-schedule-area-two bg-color pad100">
        <div class="container">
            <div class="row mt-4">
                <div class="col-lg-12">

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel">
                            <div class="table-responsive">
                                <div class="table-wrapper">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">تاریخ مراسم</th>
                                                <th>عکس</th>
                                                <th>نوع مراسم</th>
                                                <th>توضیحات</th>
                                                <th>اهمیت</th>
                                                <th>مدیریت</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($anniversaries as $anniversary)
                                                <tr class="inner-box">
                                                    <th scope="row" data-jalali="{{ $anniversary->jalaliDate }}">
                                                        <div class="event-date">
                                                            <span style="color: deeppink;">
                                                                {{ $anniversary->jalaliDay }}
                                                            </span>
                                                            <p>{{ $anniversary->jalaliMonth }}</p>
                                                        </div>
                                                    </th>
                                                    <td>
                                                        <div class="event-img">
                                                            @if ($anniversary->anniversary_type == '1')
                                                                <img src="{{ url('frontend/images/birthday-cake.png') }}"
                                                                    alt="" />
                                                            @elseif($anniversary->anniversary_type == '2')
                                                                <img src="{{ url('frontend/images/couple.png') }}"
                                                                    alt="" />
                                                            @endif


                                                        </div>
                                                    </td>
                                                    <td data-val="{{ $anniversary->anniversary_type }}">
                                                        <div class="event-wrap">
                                                            <h5 style="font-weight: bold;">
                                                                {{ $anniversary->anniversaryTypeText }}
                                                            </h5>

                                                        </div>
                                                    </td>
                                                    <td>{{ $anniversary->description }}</td>
                                                    <td data-val="{{ $anniversary->importance }}">
                                                        <h5>
                                                            {{ $anniversary->importanceText }}</h5>

                                                    </td>
                                                    <td>
                                                        <a href="#editModal" class="edit" data-type="anniversary"
                                                            data-id="{{ $anniversary->id }}" data-bs-toggle="modal">
                                                            <i class="material-icons" data-toggle="tooltip" title="Edit"
                                                                style="color: gold;">&#xE254;
                                                            </i>
                                                        </a>
                                                        <a href="#deleteanniversaryModal" class="delete"
                                                            data-id="{{ $anniversary->id }}" data-bs-toggle="modal">
                                                            <i class="material-icons" data-toggle="tooltip" title="Delete"
                                                                style="color: red;">&#xE872;
                                                            </i>
                                                        </a>
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
                <!-- /col end-->
            </div>
            <!-- /row end-->
        </div>
    </div>
@endsection


<!-- Edit Modal HTML -->
<div id="editModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" class="jalali-form"
                data-edit-url="{{ route('anniversary.update', ['anniversary' => 0]) }}"
                data-add-url="{{ route('anniversary.store') }}">
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
                        <input data-jdp id="jdp-edit" type="text" class="form-control" name="anniversary_date">
                    </div>
                    <div class="form-group">
                        <label>اهمیت مراسم</label>
                        <select class="form-select" aria-label="Default select example" name="importance">
                            <option value="3">خیلی زیاد</option>
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
                    <input type="button" class="btn " data-bs-toggle="modal" value="انصراف"
                        style="background: #f2f0f0;">
                    <input type="submit" class="btn " style="background: #ED5EDD; color:white;" value="ارسال">
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
