<div>
    <label for="{{ $name }}"
        class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}" id="{{ $name }}" name="{{ $name }}" value="{!! $attributes->get('value') !!}" placeholder
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        {{ isset($multiple) ? 'multiple' : '' }} >
    <p class="mt-2 text-sm {{ $errors->has($name) ? 'text-red-600 dark:text-red-500' : 'text-gray-600' }}">
        <span class="font-medium">
            @error($name)
                {{ $message }}
            @enderror
        </span>
</p>
</div>