@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-200 border-2 focus:border-transparent bg-transparent focus:bg-opacity-10 ']) !!}>
