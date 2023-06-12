@props(['name', 'type' => 'text'])
{{-- set the defult value of the type to text --}}


    <x-form.label name="{{ $name }}" class=""/>

    <input class="input pl-1"
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $name }}"
    {{-- value="{{ old($name) }}" --}}
    {{ $attributes(['value' => old($name) ]) }}
    >
    <x-form.error name="{{$name}}" />
