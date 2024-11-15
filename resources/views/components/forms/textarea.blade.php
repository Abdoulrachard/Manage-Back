<div>
    <label for="myeditorinstance"
        class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    <textarea 
        id="myeditorinstance" 
        name="{{ $name }}"
        class="@error($name) 
            bg-red-50 
            border border-red-500 
            text-red-900 
            placeholder-red-700 
            text-sm 
            rounded-lg 
            focus:ring-red-500 
            dark:bg-gray-700 
            focus:border-red-500 
            block w-full p-2.5 
            dark:text-red-500 
            dark:placeholder-red-500 
            dark:border-red-500 
        @else 
            block w-full 
            p-2 
            text-black 
            border border-gray-300 
            rounded-lg 
            bg-gray-50 
            text-base 
            focus:ring-blue-500 
            focus:border-blue-500 
            dark:bg-gray-700 
            dark:border-gray-600 
            dark:placeholder-gray-400 
            dark:text-white 
            dark:focus:ring-blue-500 
            dark:focus:border-blue-500 
        @enderror"
    >{{ old($name, $value ?? '') }}</textarea>
    
    <p class="mt-2 text-sm {{ $errors->has($name) ? 'text-red-600 dark:text-red-500' : 'text-gray-600 dark:text-gray-400' }}">
        <span class="font-medium">
            @error($name)
                {{ $message }}
            @enderror
        </span>
    </p>
</div>

