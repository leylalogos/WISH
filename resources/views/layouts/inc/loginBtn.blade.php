@php
    $layout = isset($smallView) ? 'mt-2 col-10 col-sm-10 col-md-5 col-lg-10 col-xl-9' : ' col-12 col-sm-10 col-md-8 col-lg-8 col-xl-6 offset-xl-1';
    $prefixText = $alternativeText ?? __('static.login with');
    $hasAccount = isset($hasAccount) && $hasAccount;
@endphp
<div class="{{ $layout }}">
    <a class="btn {{ isset($brand) ? 'brand-' . $brand : '' }} btn3d btn-lg btn-block btn-login {{ $hasAccount ? '' : 'notPressed' }}"
        href="{{ $loginUrl }}" role="button">
        <i class="{{ $bootstrapIconClass }}"></i>&nbsp;
        {{ $prefixText . $brandName }}
    </a><br>
</div>
