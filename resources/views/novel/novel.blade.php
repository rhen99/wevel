<x-layout>
    <div class="container mx-auto p-6">
        <h2 class="text-xl font-semibold mb-4">{{ $novel->title }}</h2>
        <div class="flex w-full rounded-lg p-4">
            <div class="flex-shrink-0">
                <img src="{{ asset('storage/'. $novel->cover_image) }}" alt="Novel Cover"
                    class="w-40 h-auto aspect-[9/16] object-cover" />
            </div>

            <!-- Description -->
            <div class="w-2/3 pl-4 flex flex-col">
                <p class="text-gray-700 text-sm md:text-base">
                    This is a placeholder description for the novel. Replace this text with the actual description.
                </p>
            </div>
        </div>
    </div>
</x-layout>