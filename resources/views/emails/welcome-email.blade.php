@component('mail::message')
# Welcome to Drinkster

Thank you for joining!
Start sharing your favorite drinks or
discover other Drinksters.

@component('mail::button', ['url' => ''])
Discover
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
