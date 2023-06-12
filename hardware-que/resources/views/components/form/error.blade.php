@props(['name'])

    @error($name)
    <p class="color-red listed">{{ $message }}</p>
    @enderror