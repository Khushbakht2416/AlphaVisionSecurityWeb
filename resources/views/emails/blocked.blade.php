@component('mail::message')
# Hello {{ $user->full_name }},

We regret to inform you that your access to the **AlphaVision Security** Login Portal has been **blocked**.

@component('mail::panel')
🔒 **Access Status:** Blocked
📧 If this is unexpected, please contact support immediately.
@endcomponent

> 🚫 You will not be able to access your account until further notice.

@component('mail::button', ['url' => url('/contact-us')])
Contact Support
@endcomponent

Thank you for your understanding.
**AlphaVision Security Team**
@endcomponent
