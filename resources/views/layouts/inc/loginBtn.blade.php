@php
    $layout = isset($smallView) ? 'm-2 col-10 col-sm-10 col-md-6 col-lg-11 col-xl-11' : 'mt-2 col-12 col-sm-10 col-md-8 col-lg-8 col-xl-6 offset-xl-1';
    $prefixText = $alternativeText ?? __('static.login with');
@endphp
<div class="{{ $layout }}">
    <a class="btn btn-danger btn-lg btn-block btn-login" style="background-color: {{ $background }}"
        href="{{ $loginUrl }}" role="button">
        <i class="{{ $bootstrapIconClass }}"></i>&nbsp;
        {{ $prefixText . $brandName }}
    </a><br>
</div>
