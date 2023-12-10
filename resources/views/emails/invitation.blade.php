<h1>Hello from Wish</h1>
<br><br>
{{ $inviter->name }} ask you to follow him/her. <br>

you can folow him with clicking on this link:
<a href="{{route('invite', ['username' => $inviter->username]) }}"></a>

if its not relevant to you, please diregard this email.

Regards,
{{ config('app.url') }}
