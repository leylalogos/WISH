{{--
$buttons
$user_id    
--}}
@foreach ($buttons as $btn)
    <form method="POST" action="{{ route("connection.$btn", ['user_id' => $user_id]) }}">
        @csrf
        <button class="btn btn-light btn-friend {{ "btn-connection-$btn" }}">
            {{ __("buttonText.connection $btn") }}
        </button>
    </form>
@endforeach
