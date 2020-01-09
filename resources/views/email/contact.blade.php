@component('mail::message')
# Introduction

The body of your message.

@foreach ($items as $item)
    <li>{{ $item->description }}</li>
@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent
