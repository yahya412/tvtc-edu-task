@component('mail::message')
# Yes we make it :)

thank you for subscribing and well keep in touch soon!.

@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
Home page
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
