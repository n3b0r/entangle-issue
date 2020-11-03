@props([
'leadingAddOn' => false,
'error' => false,
])

<div class="flex rounded-md shadow-sm">
    @if ($leadingAddOn)
        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
            {{ $leadingAddOn }}
        </span>
    @endif
    
    <input {{ $attributes->merge(['class' => 'flex-1 form-input border-cool-gray-300 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:outline-none focus:border-gray-300 focus:shadow-none' . ($leadingAddOn ? ' rounded-none rounded-r-md' : '')]) }}/>
    @if ($error)
        <div class="absolute inset-y-0 right-0 pr-8 pb-8 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
        </div>
    @endif

</div>
