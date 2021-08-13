@component('mail::message')
# Richiesta da {{ $mail->full_name }}

@component('mail::panel')
{{ $mail->message }}
@endcomponent

@component('mail::button', ['url' => route('profile') ])
Vai al profilo
@endcomponent

Grazie,<br>
{{ config('app.name') }}
@endcomponent
