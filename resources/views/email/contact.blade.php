@component('mail::message')
# Introduction

The body of your message.

@foreach ($item as $item)
    <li>{{ $item->description }}</li>
@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent
