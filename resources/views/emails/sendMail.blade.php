@component('mail::message')
Name: {{$data->name}}<br>
Email: {{$data->email}}<br>
Message: {{$data->message}}<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent