@component('mail::message')
# Richiesta da {{ $mail->full_name }}

@component('mail::panel')
{{ $mail->message }}

@if($mail->attachment)
Controlla il file allegato!
@endif

@endcomponent

@component('mail::button', ['url' => route('backpack') ])
Vai al pannello
@endcomponent

Grazie,<br>
{{ config('app.name') }}
@endcomponent
