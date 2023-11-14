@extends('layouts.frontend')
@section('title', 'my wish list')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="page-people-directory">
                <div class="row mt-5">
                    <div class="col-md-3">


                        {{-- <br> --}}


                        <h5 style="background: #f5f5f5; padding:8px;"><b>دوستان مورد علاقه من</b></h5>



                        <div class="list-group people-group">
                            <a href="#" class="list-group-item">
                                <div class="media">
                                    <div class="pull-left">
                                        <img class="img-circle" src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                            alt="...">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">علی حکمی</h4>
                                        <small>Software Engineer</small>
                                    </div>
                                </div>
                            </a>

                        </div>

                    </div>
                    <div class="col-md-9">
                        <div class="well">
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="text" placeholder="جستجوی افراد" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <div class="btn-group" style="display:block">
                                        <button class="btn btn-default "
                                            style="width: 100%; border-radius: 0px; background: white;  color: gray; border-color: #ddd;">
                                            جستجو </button>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <h3>همه مخاطب ها</h3>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-green btn-raised btn-add-new-contact"><span
                                        class="icon-plus" data-bs-toggle="modal" data-bs-target="#modal-pull-right-add">
                                        اضافه کردن مخاطب جدید</span></button>
                            </div>
                        </div>

                        <div class="list-group contact-group">


                            <a href="#" class="list-group-item">
                                <div class="media">
                                    <div class="pull-left">
                                        <img class="img-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                            alt="...">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">John Doe
                                        </h4>
                                        <div class="media-content">
                                            <i class="fa fa-map-marker"></i> San Francisco, California, United States
                                            <ul class="list-unstyled">
                                                <li><i class="fa fa-skype"></i> jdoe.doe</li>
                                                <li><i class="fa-solid fa-phone"></i> +63 912 212 2451</li>
                                                <li><i class="fa-regular fa-envelope"></i> joedoe@email.com</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </a>


                        </div>
                    </div>
                </div>
                <div class="modal modal-pull-right" data-easein="fadeInRight" data-easeout="fadeOutRight"
                    id="modal-pull-right-add" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content animated fadeOutRight">
                            <div class="modal-body">
                                <div class="row modal-close">
                                    <div class="col-md-12 padding-bottom-8 padding-top-8 bg-silver">
                                        <h4 class="pull-left"><b>Create New Contact</b></h4>
                                        <ul class="list-unstyled list-inline text-right">
                                            <li class="close-right-modal"><span class="fa fa-times fa-2x"
                                                    data-dismiss="modal"></span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="contact-add-content">
                                            <form class="form-horizontal tabular-form margin-top-10">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">Name</label>
                                                    <div class="col-sm-10 tabular-border">
                                                        <input type="text" class="form-control" id="name"
                                                            placeholder="Full Name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="col-sm-2 control-label">Email</label>
                                                    <div class="col-sm-10 tabular-border">
                                                        <input type="text" class="form-control" id="email"
                                                            placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone" class="col-sm-2 control-label">Phone</label>
                                                    <div class="col-sm-10 tabular-border">
                                                        <input type="text" class="form-control" id="phone"
                                                            placeholder="Phone">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address" class="col-sm-2 control-label">Address</label>
                                                    <div class="col-sm-10 tabular-border">
                                                        <input type="text" class="form-control" id="address"
                                                            placeholder="Address">
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <button type="button" class="btn btn-silver btn-flat">Cancel</button>
                                                    <button type="button" class="btn btn-green btn-flat">Save
                                                        Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
