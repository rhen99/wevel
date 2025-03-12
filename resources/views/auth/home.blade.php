<x-layout>
    <div class="container mx-auto p-6">
        <h2 class="text-xl font-semibold mb-4">Your Novels</h2>
        <div>
            @forelse ($novels as $novel)
            <div class="flex  bg-white overflow-hidden">
                <img class="w-14 h-25 object-cover" src="{{ asset('storage/'. $novel->cover_image) }}" alt="Thumbnail">
                <div class="p-2 flex-1">
                    <h2 class="text-md font-bold text-gray-800">{{ $novel->title }}</h2>
                    <div class="novel-actions py-2 space-x-2">
                        <a href="{{ route('chapters.create', ['novel' => $novel->id]) }}"
                            class="px-2 py-1 bg-blue-500 text-white text-sm rounded-lg hover:bg-blue-600 transition">
                            Add Chapter
                        </a>
                        <a href="{{ route('novels.show', ['novel' => $novel->id]) }}"
                            class="px-2 py-1 bg-cyan-500 text-white text-sm rounded-lg hover:bg-cyan-600 transition">
                            View Novel
                        </a>
                        <a href="{{ route('novels.edit', ['novel' => $novel->id]) }}"
                            class="px-2 py-1 bg-yellow-500 text-white text-sm rounded-lg hover:bg-yellow-600 transition">
                            Edit Novel
                        </a>
                        <a href="#"
                            class="deleteBtn px-2 py-1 bg-red-500 text-white text-sm rounded-lg hover:bg-red-600 transition">
                            Delete Novel
                        </a>
                        <form action="{{ route('novels.destroy', ['novel' => $novel->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <p>No Novels found.</p>
            @endforelse
        </div>
    </div>
</x-layout>

<script>
    const deleteBtn = document.querySelectorAll(".deleteBtn");
    deleteBtn.forEach(btn => {
        btn.addEventListener("click", (e) => {
        e.preventDefault();
        if(confirm("Are you sure you want to delete this novel?")){
            btn.nextElementSibling.submit();
        }
    });        
    });
</script>