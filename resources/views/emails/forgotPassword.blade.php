@component('mail::message')
# Hello {{ $user->full_name }},

You have requested to reset your password. Click the button below to reset it:

@component('mail::button', ['url' => url('customerportal/passwordReset/' . $user->remember_token)])
Reset Password
@endcomponent

@component('mail::panel')
If you did not request a password reset, no further action is required.  
In case you have issues, please contact our support team.
@endcomponent

> ⚠️ For security reasons, please ignore this email if you didn't initiate the request.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
