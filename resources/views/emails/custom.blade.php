@component('mail::message')
# Message

{!! nl2br(e($bodyText)) !!}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
