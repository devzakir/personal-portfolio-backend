@component('mail::message')
# {{ $contact->subject }}

<div><strong> Name :</strong> {{ $contact->name }} </div>
<div><strong> Email :</strong> {{ $contact->email }} </div>
<hr>
{{ $contact->message }}

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}


{{-- Thanks,<br>
{{ config('app.name') }} --}}
@endcomponent
