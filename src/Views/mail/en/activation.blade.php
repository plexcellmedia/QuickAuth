# Verify account
<br>
Before you can login to your account, you must verify it!
<br>
Click link below to activate account.
<a href="{{ route('quickauth.activate.do', [$userId, $code]) }}">{{ route('quickauth.activate.do', [$userId, $code]) }}</a>
<br>

Thanks,<br>
{{ config('app.name') }}