@php
    use App\Models\Contact;

@endphp
@extends('layouts.frontend')
@section('title', 'My contacts')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="page-people-directory">
                <div class="row mt-5">
                    <div class="col-md-3">
                        {{-- <br> --}}
                        <h5 style=" background: #f5f5f5; padding:10px;">
                            <b> پیدا کردن دوستان از طریق: </b>
                        </h5>
                        <div class="list-group people-group">
                            <div class="row">
                                <div class="col-12">
                                    <button id="fetch-contacts-btn" class="btn-section" style=" border-radius:20px">
                                        مخاطب های تلفن موبایل
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="list-group people-group">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <button id="fetch-contacts-btn" class="btn-section" style=" border-radius:20px">
                                        مخاطب های اکانت گوگل
                                    </button>
                                </div>
                            </div>
                        </div>
                        <h5 style="margin-top:30px; background: #f5f5f5; padding:10px;"><b>دوستان مورد علاقه من</b></h5>
                        <div class="list-group people-group">
                            <a href="#" class="list-group-item">
                                @foreach ($contacts as $contact)
                                    @if ($contact->state != Contact::STATE_TO_INVITE)
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="img-circle"
                                                    src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="...">
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    {{ $contact->name }}
                                                </h4>

                                                <small>
                                                    gg
                                                </small>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
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
                                <button type="button" class="btn btn-light btn-raised btn-add-new-contact"
                                    style=" color:gray; font-weight:bold;">
                                    <span class="icon-plus" data-bs-toggle="modal" data-bs-target="#modal-pull-right-add">
                                        افزودن مخاطب جدید </span>
                                </button>
                            </div>
                        </div>

                        <div class="contact-group row">
                            @foreach ($contacts as $contact)
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                    <a href="#" class="list-group-item">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="img-circle" src="{{ url('frontend/images/avatar.png') }}"
                                                    alt="...">
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">{{ $contact->name }}
                                                </h4>
                                                <div class="media-content">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            @if ($contact->source == 'email')
                                                                <i class="fa-regular fa-envelope"></i>
                                                            @elseif($contact->source == 'gsm')
                                                                <i class="fa-regular fa-phone"></i>
                                                            @endif
                                                            {{ $contact->source_id }}
                                                        </li>
                                                        <div class="row justify-content-end">
                                                            {{-- <div class="col-6"> --}}
                                                            @switch($contact->state)
                                                                @case(Contact::STATE_TO_INVITE)
                                                                    <div class="col-6">


                                                                        <button class="btn btn-section"
                                                                            style="background:#be89e6; color:white">
                                                                            دعوت کردن
                                                                        </button>
                                                                    </div>
                                                                @break

                                                                @case(Contact::STATE_FOLLOWED)
                                                                    <div class="col-6">

                                                                        <button class="btn btn-section"
                                                                            style="background: #c66c36; color:#686565">
                                                                            دنبال نکردن
                                                                        </button>
                                                                    </div>
                                                                @break

                                                                @case(Contact::STATE_TO_REACT)
                                                                    <div class="col-6">
                                                                        <form
                                                                            action="{{ route('contacts.follow', ['user_id' => $contact->getAccount()->user_id]) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="nickname"
                                                                                value="{{ $contact->name }}">
                                                                            <button class="btn btn-section"
                                                                                style="background: #79BB66; color:white">
                                                                                دنبال کردن </button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-6">


                                                                        <button class="btn btn-section"
                                                                            style="background: #79BB66; color:white">
                                                                            بی خیال </button>
                                                                    </div>
                                                                @break

                                                                @case(Contact::STATE_SKIPPED)
                                                                    <div class="col-6">

                                                                        <button class="btn btn-section"
                                                                            style="background: blue; color:#686565">
                                                                            دنبال کردن
                                                                        </button>
                                                                    </div>
                                                                @break

                                                                @default
                                                            @endswitch
                                                            {{-- </div> --}}
                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
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
                                        <h4 class="pull-left"><b>اضافه کردن مخاطب جدید</b></h4>
                                        <ul class="list-unstyled list-inline text-right">
                                            <li class="close-right-modal">
                                                <span class="fa fa-times fa-2x" data-bs-toggle="modal"
                                                    style="float: left;
                                                color: #938e8e;
                                                background: #f2f0f0;"></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="contact-add-content">
                                            <form method="post" action="{{ route('contacts.create') }}"
                                                class="form-horizontal tabular-form margin-top-10">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">نام</label>
                                                    <div class="col-sm-10 tabular-border">
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" placeholder="نام مخاطب را وارد کنید.">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone" class="col-sm-2 control-label">شماره
                                                        موبایل</label>
                                                    <div class="col-sm-10 tabular-border">
                                                        <input type="text" class="form-control" id="phone"
                                                            name="tell" placeholder="شماره موبایل را وارد کنید.">
                                                    </div>
                                                </div>

                                                <div class="form-actions"
                                                    style="margin-top: 22px;
                                                float: left;">
                                                    <button type="button" class="btn  btn-flat"
                                                        style="background: #f2f0f0;"
                                                        data-bs-toggle="modal">انصراف</button>
                                                    <button type="submit" class="btn  btn-flat"
                                                        style="background: #ED5EDD; color:white;">
                                                        اضافه کردن</button>
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
