@extends('pages.profile.layout')
@section('profile-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">اطلاعات شخصی </h5>
                    <button id="edit-btn" type="button" class="btn btn-primary waves-effect waves-light f-right">
                        <i class="icofont icofont-edit"></i>
                    </button>
                </div>
                <div class="card-block">
                    <div id="view-info" class="row">
                        <div class="col-lg-6 col-md-12">
                            <form>
                                <table class="table table-responsive m-b-0">
                                    <tbody>
                                        <tr>
                                            <th class="social-label b-none p-t-0">
                                                نام
                                            </th>
                                            <td class="social-user-name b-none p-t-0 text-muted">
                                                {{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="social-label b-none">تاریخ تولد
                                            </th>
                                            <td class="social-user-name b-none text-muted">
                                                {{ $user->birthdate }}</td>
                                        </tr>
                                        <tr>
                                            <th class="social-label b-none">Birth Date
                                            </th>
                                            <td class="social-user-name b-none text-muted">
                                                October 25th, 1990</td>
                                        </tr>
                                        <tr>
                                            <th class="social-label b-none">Martail
                                                Status</th>
                                            <td class="social-user-name b-none text-muted">
                                                Single</td>
                                        </tr>
                                        <tr>
                                            <th class="social-label b-none p-b-0">
                                                Location</th>
                                            <td class="social-user-name b-none p-b-0 text-muted">
                                                New York, USA</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
