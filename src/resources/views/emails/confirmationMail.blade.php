@component('mail::message')
# Order bevestigd
 
Order bevestigd
 
@component('mail::button', ['url' => $url])
Factuur bekijken
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent