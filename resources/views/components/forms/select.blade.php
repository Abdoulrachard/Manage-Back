<div>
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium  text-gray-900">{{ $label }}</label>
    <select id="{{ $name }}" name="{{ $name }}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 text-black">
        <option value="" disabled selected>Choisissez une catégorie</option>
        {{ $slot }}
    </select>
    <p class="mt-2 text-sm {{ $errors->has($name) ? 'text-red-600 dark:text-red-500' : 'text-gray-600' }}">
        <span class="font-medium">
        @error($name)
            {{ $message }}
        @enderror
        </span>
</p>
</div>
