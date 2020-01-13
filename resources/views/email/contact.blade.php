@component('mail::message')
# Introduction

The body of your message.

@foreach ($items as $item)
<div>
  <input type="checkbox" id="item" name="item">
  <label for="item">{{ $item->description }}</label>
</div>
@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent
