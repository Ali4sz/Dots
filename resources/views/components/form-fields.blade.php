@props(['for'=>''])

<div class="login-form-group">
    <label for="{{ $for }}">{{ $slot }}</label>
    <input {{ $attributes }}>
</div>