<div class="list-group-item d-flex align-items-center">
    <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
        alt="connection profile picture"
        width="50px"
        class="rounded-sm ml-n2"
    />
    <div class="flex-fill pl-3 pr-3">
        <div>
            <a href="#" class="text-dark font-weight-600">
                {{ $connectedUser->name }}
            </a>
        </div>
        <div class="text-muted fs-13px">
            {{ $connectedUser->username }}
        </div>
    </div>
    @foreach ($buttons as $btn)
        <form method="POST"
        action="{{ route($btn['routeName'],['user_id' => $connectedUser->id])}}">
            @csrf
            <button class="btn btn-light btn-friend" style="{{ $btn['style'] }}">
                {{ $btn['txt'] }}
            </button>
        </form>
    @endforeach
</div>
