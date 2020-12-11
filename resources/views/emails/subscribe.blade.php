@component('mail::message')
# Yes we make it :)

thank you for subscribing and well keep in touch soon!.

@component('mail::button', ['url' => 'https://yahyasblog.herokuapp.com/'])
Home page
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
