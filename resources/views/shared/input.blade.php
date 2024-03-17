@php
    $class ??= null;
    $type ??= 'text';
    $name ??= '';
    $label ??= ucfirst($name);
    $value ??= '';
    $invalidClass =
        'bg-red-50 p-2 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500';
    $validClass =
        'block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
@endphp

<div @class(['test', $class])>
    <label for="{{ $name }}"
        class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}"
        class="@error($name) {{ $invalidClass }} @else {{ $validClass }} @enderror">
    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">
            @error($name)
                {{ $message }}
            @enderror
    </p>
</div>
