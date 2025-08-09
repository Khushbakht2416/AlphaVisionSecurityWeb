@component('mail::message')
# Hello {{ $user->full_name }},

Welcome! Below are your login credentials for accessing your login portal:

@component('mail::panel')
**Email:** {{ $user->email }}
**Password:** {{ $user->raw_password ?? '******' }}
@endcomponent

@component('mail::button', ['url' => url('/customerportal/login')])
Login Now
@endcomponent

> ⚠️ For security reasons, please change your password after logging in.

If you have any questions or need help, feel free to contact our support team.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
