<div class="list-group-item d-flex align-items-center">
    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="connection profile picture" width="50px"
        class="rounded-sm ml-n2" />
    <div class="flex-fill pl-3 pr-3">
        <div>
            <a href="{{ route('profile', ['user_id' => $connectedUser->id, 'section' => 'event']) }}"
                class="text-dark font-weight-600">
                {{ $connectedUser->name }}
            </a>
        </div>
        <div class="text-muted fs-13px">
            {{ $connectedUser->username }}
        </div>
    </div>
    @include('partials.user-connection-buttons', [
        'buttons' => $buttons,
        'user_id' => $connectedUser->id,
    ])
</div>
