@props([
	'error' => false,
	'height' => 'sm',
	'maxHeight' => [
		'sm' => 'max-h-24',
		'md' => 'max-h-48',
		'lg' => 'max-h-60',
		'xl' => 'max-h-72',
	]
])
<div
	x-data="{ open: false }"
	@keydown.window.escape="open = false"
	@click.away="open = false"
	{{ $attributes->merge(['class' => 'space-y-1']) }}
>
	<div class="relative">
		<span class="inline-block w-full rounded-md shadow-sm">
			<button @click="open = !open" @click.away="open = false" type="button" class="cursor-default relative w-full rounded-md border border-gray-300 bg-white pl-3 pr-10 py-2 text-left focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5 @if($error) border-red-700 @endif">
				<span class="block truncate">
						{{ $defaultOption ?? '---' }}
				</span>
				<span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
					<svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="none" stroke="currentColor">
						<path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</span>
		</button>
	</span>
		<div
			x-show="open"
			@click.away="open = false"
			x-transition:leave="transition ease-in duration-100"
			x-transition:leave-start="opacity-100"
			x-transition:leave-end="opacity-0"
			class="absolute mt-1 w-full rounded-md bg-white shadow-lg"
		>
			<ul tabindex="-1" role="listbox" {{ $attributes->wire('model') }} class="{{ $maxHeight[$height] }} rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">
				{{ $slot }}
			</ul>
		</div>
	</div>
</div>
