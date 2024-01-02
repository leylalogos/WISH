{{--
$brandName
$svg
$loginUrl
$hasAccount
$btnText
--}}

<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
    <h6 class="mb-0">
        {!! $svg !!}
        {{ $brandName }}</h6>
    <a class="btn btn-success" href="{{ $loginUrl }}">
        {{ $btnText }}
    </a>
</li>
