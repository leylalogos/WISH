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
                                                @foreach ($events as $event)
                                                    <tr class="inner-box">
                                                        <th scope="row" data-jalali="{{ $event->jalaliDate }}">
                                                            <div class="event-date">
                                                                <span style="color: deeppink;">
                                                                    {{ $event->jalaliDay }}
                                                                </span>
                                                                <p>{{ $event->jalaliMonth }}</p>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="event-img">
                                                                <img src="{{ url('frontend/images/event.png') }}"
                                                                    alt="" />
                                                            </div>
                                                        </td>

                                                        <td data-val="{{ $event->title }}">
                                                            <div class="event-wrap">
                                                                <h5 style="font-weight: bold;">
                                                                    {{ $event->title }}
                                                                </h5>

                                                            </div>
                                                        </td>

                                                        <td>{{ $event->description }}</td>

                                                        <td data-val="{{ $event->importance }}">
                                                            <h5>
                                                                {{ $event->importanceText }}
                                                            </h5>
                                                        </td>

                                                        <td>
                                                            <a href="#editModal" class="edit" data-type="event"
                                                                data-id="{{ $event->id }}" data-bs-toggle="modal">
                                                                <i class="material-icons" data-toggle="tooltip"
                                                                    title="Edit" style="color: gold;">&#xE254;
                                                                </i>
                                                            </a>
                                                            <a href="#deleteanniversaryModal" class="delete"
                                                                data-id="{{ $event->id }}" data-bs-toggle="modal">
                                                                <i class="material-icons" data-toggle="tooltip"
                                                                    title="Delete" style="color: red;">&#xE872;
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



            </div>
        </div>
    @endsection




    <!-- Edit Modal HTML -->
    <div id="editModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="post" class="jalali-form" data-edit-url="{{ route('event.update', ['event' => 0]) }}"
                    data-add-url="{{ route('event.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">ویرایش مراسم</h4>
                        <button type="button" class="close" data-bs-toggle="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>نوع مراسم</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>تاریخ مراسم</label>
                            <input data-jdp id="jdp-edit" type="text" class="form-control" name="date">
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
                <form method="post" action="{{ route('event.delete', ['event' => 0]) }}">
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
