@component('mail::message')
# Contact Us

{{ $name }} has sent you a message.

## Subject: {{ $subject }}

## Message
{!! nl2br(e($message)) !!}

## Email: {{ $email }}

@component('mail::button', ['url' => "{{ url('/admin/contact') }}"])
View in Admin
@endcomponent

@endcomponent
