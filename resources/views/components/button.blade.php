@props(['style'=>'button'])

@if ($style === 'a')

<a {{ $attributes }}>{{ $slot }}</a>

@else

<button {{ $attributes }}>{{ $slot }}</button>

@endif