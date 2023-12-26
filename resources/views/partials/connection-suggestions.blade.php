<div class="friend-list auto-scroll-container row mt-3">
    @foreach ($suggestions as $contact_id => $user)
        <div class="col-lg-3" id="suggestion-{{ $loop->iteration }}">
            <div class="card card-one">
                <div class="header">
                    <div class="avatar">
                        <img src="{{ url('frontend/images/image1.png') }}" alt="user">
                    </div>
                </div>
                <h3>{{ $user->username }}</h3>
                <div class="desc">
                    <p> {{ $loop->iteration }} wishes</p>
                </div>


                <div class="row justify-content-center mb-4">
                    <div class="col-5">
                        <form action="{{ route('contacts.follow', ['user_id' => $user->id]) }}" method="post">
                            @csrf
                            <input type="hidden" name="contact_id" value="{{ $contact_id }}">
                            <button class="btn btn-outline-success">دنبال
                                کردن</button>
                        </form>
                    </div>
                    <div class="col-5">
                        <form method="POST" action="{{ route('contacts.skip', ['user_id' => $user->id]) }}">
                            @csrf
                            <input type="hidden" name="contact_id" value="{{ $contact_id }}">
                            <button class="btn btn-outline-danger">
                                نشان نده
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
</div>
