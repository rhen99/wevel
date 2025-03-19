<x-layout>
    <div class="container mx-auto p-6">
        <h2 class="text-xl font-semibold mb-4">{{ $novel->title }}</h2>
        @if (auth()->user() && auth()->user()->id === $novel->user_id)
        <div class="p-4">
            <a href="{{ route('chapters.create', ['novel' => $novel->id]) }}"
                class="px-4 py-1.5 bg-cyan-500 text-white text-md hover:bg-cyan-600 transition">
                &plus; Add Chapter
            </a>
        </div>
        @endif

        <div class="flex w-full p-4">
            <div class="flex-shrink-0">
                <img src="{{ asset('storage/'. $novel->cover_image) }}" alt="Novel Cover"
                    class="w-40 h-auto aspect-[9/16] object-cover" />
            </div>

            <div class="w-2/3 pl-4 flex flex-col">
                <p class="text-gray-700 text-sm md:text-base">
                    {{ $novel->description ?? "(no discription)" }}
                </p>
            </div>
        </div>
        <div>
            @forelse ($novel->chapters as $chapter)
            <div class=" bg-white p-4 hover:bg-gray-200 flex">
                <p class="text-gray-700 flex-1">
                    Chapter {{ $chapter->chapter_number }} - {{ $chapter->title }}
                </p>
                <div class="flex space-x-3">
                    <a href="{{ route('chapters.show', ['chapter' => $chapter->id, 'novel' => $novel->id]) }}"
                        class="underline hover:text-cyan-700">Read</a>
                    @if (auth()->user() && auth()->user()->id === $novel->user_id)
                    <a href="{{ route('chapters.edit', ['chapter' => $chapter->id, 'novel' => $novel->id]) }}"
                        class="underline hover:text-cyan-700">Edit</a>
                    <a href="#" class="underline deleteBtn hover:text-red-700">Delete</a>
                    <form action="{{ route('chapters.destroy', ['chapter' => $chapter->id, 'novel' => $novel->id]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                    @endif
                </div>
            </div>
            @empty
            <p class="p-4">no chapters</p>
            @endforelse
        </div>
    </div>
</x-layout>
<script>
    const deleteBtn = document.querySelectorAll(".deleteBtn");
    deleteBtn.forEach(btn => {
        btn.addEventListener("click", (e) => {
        e.preventDefault();
        if(confirm("Are you sure you want to delete this chapter?")){
            btn.nextElementSibling.submit();
        }
    });        
    });
</script>