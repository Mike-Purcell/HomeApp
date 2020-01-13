@component('mail::message')
# Introduction

The body of your message.

@foreach ($items as $item)
    {{ $item->id }}. {{ $item->description }}
@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent
