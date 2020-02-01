@component('mail::message')
<b>Name:</b> {{$data->name}}<br>
<b>Email:</b> {{$data->email}}<br>
<b>Message:</b> {{$data->message}}<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent