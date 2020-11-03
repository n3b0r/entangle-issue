@props(['id' => null, 'maxWidth' => null, 'position' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" :position="$position" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg">
            {{ $title }}
        </div>

        <div class="mt-4">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        {{ $footer }}
    </div>
</x-modal>
