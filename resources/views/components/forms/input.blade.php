<div>
    
    <label for="{{ $name }}"
        class="block mb-2 text-sm font-medium {{ $errors->has($name) ? 'text-red-700' : 'text-gray-900' }}">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name) }}" multiple='{{ $multiple ?? false }}' placeholder
        class="block w-full p-2 border rounded-lg focus:outline-none focus:ring-2 {{ $errors->has($name) ? 'ring-red-500 border-red-500 placeholder-red-700 text-black' : 'ring-blue-500 border-gray-300 placeholder-gray-400 text-black' }} dark:border-gray-600 dark:bg-gray-700 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <p class="mt-2 text-sm {{ $errors->has($name) ? 'text-red-600' : 'text-gray-600' }}"><span class="font-medium">
            @error($name)
                {{ $message }}
            @enderror
        </span>
    </p>
</div>
