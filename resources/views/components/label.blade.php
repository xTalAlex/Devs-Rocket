@props(['value','theme'])

@if(isset($theme) && $theme==='dark')
<label {{ $attributes->merge(['class' => 'block uppercase text-white text-xs font-bold mb-2']) }}>
    {{ $value ?? $slot }}
</label>
@else 
<label {{ $attributes->merge(['class' => 'block uppercase text-gray-700 text-xs font-bold mb-2']) }}>
    {{ $value ?? $slot }}
</label>
@endif

