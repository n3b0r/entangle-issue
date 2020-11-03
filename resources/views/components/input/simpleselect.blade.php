@props([
	'error' => false,
	'multiple' => false
])
<div>
	<select
		class="block w-full pl-3 py-2 text-base leading-6 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 {{ $error ? 'border-red-700' : 'border-gray-300' }} {{ $multiple ? 'form-multiselect mt-4' : 'form-select pr-10 mt-1' }}"
		{{ $attributes->wire('model') }}
		{{ $multiple ? 'multiple' : '' }}
	>
		@unless ($multiple)
			<option hidden>---</option>
		@endunless
		{{ $slot }}
	</select>
</div>
