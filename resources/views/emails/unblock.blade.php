@component('mail::message')
# Hello {{ $user->full_name }},

Great news! Your access to the **AlphaVision Security** Customer Portal has been **restored**.

@component('mail::panel')
🔓 **Access Status:** Active
You may now log back into your portal and continue using our services.
@endcomponent

@component('mail::button', ['url' => url('/customerportal/login')])
Login Now
@endcomponent

If you have any questions or face issues, feel free to reach out.

Thanks,<br>
**AlphaVision Security Team**
@endcomponent
