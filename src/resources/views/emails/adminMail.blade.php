@component('mail::message')
# Nieuwe order
 
Nieuwe order
 
@component('mail::button', ['url' => $url])
Factuur bekijken
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent