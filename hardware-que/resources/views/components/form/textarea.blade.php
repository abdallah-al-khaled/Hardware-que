@props(['name'])

    <x-form.label name="{{ $name }}" />

    <textarea class="border border-gray-200 p-2 w-full rounded h-40" 
    type="text" 
    name="{{ $name }}" id="{{ $name }}"
        required>{{ $slot ?? old($name) }}</textarea>

    <x-form.error name="{{ $name }}" />
