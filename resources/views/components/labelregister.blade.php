@props(['value'])

<label {{ $attributes->merge(['class' => 'block uppercase text-gray-200 text-xs font-bold mb-2']) }}>
    {{ $value ?? $slot }}
</label>
