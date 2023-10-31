@extends('layouts.frontend')
@section('title', 'Wish')
@section('content')
    <div class="index-card" style="margin-top:0px;">
        <div class="text-center mt-5">
            <h1> {{ __('static.slogan') }} </h1>
            <a href="{{ route('wishlist.create') }}" class="btn btn-light  mt-5">
                {{ __('static.start creating my wish list') }}
            </a>
        </div>
    </div>
    {{-- describe side --}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container bootstrap snippets bootdey">
        <div class="row mt-5">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="panel panel-dark panel-colorful" style="padding: 19px">
                    <div class="panel-body text-center">
                        <i class="fa fa-users fa-5x"></i>
                        <hr>
                        <small>
                            دوستات رو فالو کن.
                        </small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="panel panel-danger panel-colorful" style="padding: 19px">
                    <div class="panel-body text-center">
                        <i class="fa-solid fa-wand-magic-sparkles fa-5x"></i>
                        <hr>
                        <small>
                            دوستاتو سوپرایز کن.
                        </small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="panel panel-primary panel-colorful" style="padding: 19px">
                    <div class="panel-body text-center">
                        <i class="fa-solid fa-share-nodes fa-5x"></i>
                        <hr>

                        <small>
                            </span>
                            آرزوهاتو به دوستات به اشتراک بزار.</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="panel panel-info panel-colorful" style="padding: 19px">
                    <div class="panel-body text-center">
                        <i class="fa-solid fa-gift fa-5x"></i>
                        <hr>
                        <small>
                            لیست آرزوهاتو اضافه کن</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- goal side --}}
    <div class="container">
        <div class="index-card">
            <div class="text-center mt-5">
                <h1> {{ __('static.goal') }} </h1>
            </div>
            <div class="text-center static-text" id="about-text">
                {!! nl2br(__('texts.about')) !!}
            </div>
        </div>
    </div>
@endsection

@push('meta-tags')
    <meta name="robots" content="index">
@endpush
