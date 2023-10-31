{{--
     $text the text to show on the button
     $id optional     
--}}
<div class="row mb-2 justify-content-end">
    <div class="col-4 col-md-2">
        <button id="{{ $id ?? '' }}" class="btn btn-light btn-section" type="submit">
            {!! $text !!}
        </button>
    </div>
</div>
