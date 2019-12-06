@component('mail::message')
# Activate your account

Thanks for signing up, please verify your email to activate your account.

@component('mail::button', ['url' => route('activate', ['token' => $user->activation_token, 'email' => $user->email])])
Verify
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
