@props([
	'value' => '',
	'selected' => false,
	'setSelected' => 'selectedOption'
])
<li
	x-data="{ hover: false }"
	@mouseenter="hover = true"
	@mouseleave="hover = false"
	:class="{ 'text-white bg-indigo-600': hover === true, 'text-gray-900': !(hover === true) }"
	class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9 "
	role="option"
	wire:click="{{ $setSelected }}({{ $value }})"
>
	<span class="font-normal block truncate {{ $selected ? 'font-semibold' : 'font-normal' }}">
		{{ $slot }}
	</span>
	@if($selected)
		<span
			:class="{ 'text-white': hover === true, 'text-indigo-600': !(hover === true) }"
			class="absolute inset-y-0 right-0 flex items-center pr-4"
		>
			<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
			</svg>
		</span>
	@endif
</li>