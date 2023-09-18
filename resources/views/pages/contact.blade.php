@extends('layouts.frontend')

@section('content')
    <div class="container">
        <!--Section: Contact v.2-->
        <section class="mb-4">
            <div class="card mt-5">
                <!--Section heading-->
                <div class="card-header">
                    <h2 class="font-weight-bold my-4 text-center " style="font-family: vazir;">{{ __('static.contact_us') }}
                    </h2>
                </div>
                <!--Section description-->

                <div class="card-body">
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-9 mb-md-0 mb-5">
                            <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <label for="name" class="">{{ __('static.name') }}</label>
                                            <input type="text" id="name" name="name" class="form-control">

                                        </div>
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <label for="email" class="">{{ __('static.email') }}</label>

                                            <input type="text" id="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <label for="subject" class="">{{ __('static.title') }}</label>

                                            <input type="text" id="subject" name="subject" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-12">

                                        <div class="md-form">
                                            <label for="message"> {{ __('static.your_message') }}</label>

                                            <textarea type="text" id="message" name="message" rows="3" class="form-control md-textarea"></textarea>
                                        </div>

                                    </div>
                                </div>
                                <!--Grid row-->

                            </form><br>

                            <div class="text-center text-md-left" style="color: white;">
                                <a class="btn btn-primary">{{ __('static.send') }}</a>
                            </div>
                            <div class="status"></div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-3 text-center">
                            <ul class="list-unstyled mb-0">
                                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                    <p>ترکیه</p>
                                </li>

                                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                                    <p>905521111111+</p>
                                </li>

                                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                                    <p>wish-contact@xnor.one</p>
                                </li>
                            </ul>
                        </div>
                        <!--Grid column-->

                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--Section: Contact v.2-->
@endsection
