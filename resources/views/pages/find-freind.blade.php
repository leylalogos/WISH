@extends('layouts.frontend')
@section('title', 'my wish list')
@section('content')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
        integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <br />
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <form class="card card-sm">
                <div class="card-body row no-gutters align-items-center">
                    <div class="col-auto">
                        <i class="fas fa-search h4 text-body"></i>
                    </div>
                    <!--end of col-->
                    <div class="col">
                        <input class="form-control form-control-lg form-control-borderless" type="search"
                            placeholder="نام کاربری یا ایمیل وارد کن.">
                    </div>
                    <!--end of col-->
                    <div class="col-auto">
                        <button type="button" class="btn btn-section btn-lg"><span class="glyphicon glyphicon-ok"></span>
                            جستجو</button>
                    </div>
                    <!--end of col-->
                </div>
            </form>
        </div>
        <!--end of col-->
    </div>



    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3">
                <div class="card card-one">
                    <div class="header">
                        <div class="avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                        </div>
                    </div>
                    <h3>Amillie Price</h3>
                    {{-- <div class="desc">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit et cupiditate deleniti.
                    </div> --}}
                    <div class="contacts">
                        <a href="#"><i class="fas fa-plus"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                        <div class="clear"></div>
                    </div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-8">
                            <button class="btn btn-outline-dark"
                                style="width: 100%;
                            padding: 12px;
                            border-radius: 15px;">send</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-one">
                    <div class="header">
                        <div class="avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        </div>
                    </div>
                    <h3>Victoria Fox</h3>
                    <div class="desc">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit et cupiditate deleniti.
                    </div>
                    <div class="contacts">
                        <a href="#"><i class="fas fa-plus"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                        <div class="clear"></div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-one">
                    <div class="header">
                        <div class="avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
                        </div>
                    </div>
                    <h3>Coray Shoe</h3>
                    <div class="desc">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit et cupiditate deleniti.
                    </div>
                    <div class="contacts">
                        <a href="#"><i class="fas fa-plus"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                        <div class="clear"></div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-one">
                    <div class="header">
                        <div class="avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                        </div>
                    </div>
                    <h3>Christiano Mooray</h3>
                    <div class="desc">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit et cupiditate deleniti.
                    </div>
                    <div class="contacts">
                        <a href="#"><i class="fas fa-plus"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                        <div class="clear"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="card card-one">
                    <div class="header">
                        <div class="avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="">
                        </div>
                    </div>
                    <h3>Lynda West</h3>
                    <div class="desc">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit et cupiditate deleniti.
                    </div>
                    <div class="contacts">
                        <a href="#"><i class="fas fa-plus"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                        <div class="clear"></div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-one">
                    <div class="header">
                        <div class="avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                        </div>
                    </div>
                    <h3>Jayden G</h3>
                    <div class="desc">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit et cupiditate deleniti.
                    </div>
                    <div class="contacts">
                        <a href="#"><i class="fas fa-plus"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                        <div class="clear"></div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-one">
                    <div class="header">
                        <div class="avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
                        </div>
                    </div>
                    <h3>Julia Ann</h3>
                    <div class="desc">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit et cupiditate deleniti.
                    </div>
                    <div class="contacts">
                        <a href="#"><i class="fas fa-plus"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                        <div class="clear"></div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-one">
                    <div class="header">
                        <div class="avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        </div>
                    </div>
                    <h3>Ava Ray</h3>
                    <div class="desc">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit et cupiditate deleniti.
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
