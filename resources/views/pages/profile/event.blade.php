@extends('pages.profile.layout')
@section('profile-content')
    <div class="row">
        @foreach ($anniversaries as $anniversary)
            <div class="col-xl-12">
                <div class="event-list-content fix">
                    <ul data-animation="fadeInUp animated" data-delay=".2s" style="animation-delay: 0.2s;" class="">
                        <li>اهمیت مراسم: {{ $anniversary->importanceText }}</li>
                        <li>{{ $anniversary->jalaliDate }}</li>
                    </ul>
                    <h2>{{ $anniversary->anniversaryTypeText }}</h2>
                    <p>{{ $anniversary->description }}</p>
                    {{-- <a href="#" class="btn mt-20 mr-10"><i class="far fa-ticket-alt"></i>
                        Buy Ticket</a>
                    <a href="#" class="btn mt-20">Read More</a> --}}
                    <div class="crical"> </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
