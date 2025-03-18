<x-layout>
    <div class="container mx-auto p-6">
        <h2 class="text-xl font-semibold mb-4">Your Novels</h2>
        <div>
            @forelse ($novels as $novel)
            <div class="flex  bg-white overflow-hidden">
                <img class="w-14 h-25 object-cover" src="{{ asset('storage/'. $novel->cover_image) }}" alt="Thumbnail">
                <div class="p-4 flex-1">
                    <h2 class="text-md font-bold text-gray-800">{{ $novel->title }}</h2>
                    <div class="novel-actions py-2 space-x-2">
                        <a href="{{ route('chapters.create', ['novel' => $novel->id]) }}"
                            class="underline text-gray-500 hover:text-cyan-700">
                            Add Chapter
                        </a>
                        <a href="{{ route('novels.show', ['novel' => $novel->id]) }}"
                            class="underline text-gray-500 hover:text-cyan-700">
                            View Novel
                        </a>
                        <a href="{{ route('novels.edit', ['novel' => $novel->id]) }}"
                            class="underline text-gray-500 hover:text-cyan-700">
                            Edit Novel
                        </a>
                        <a href="#" class="deleteBtn underline text-gray-500 hover:text-red-700">
                            Delete Novel
                        </a>
                        <form class="absolute left-[-99999px]"
                            action="{{ route('novels.destroy', ['novel' => $novel->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a href="#" class="publish underline text-gray-500 hover:text-cyan-700">
                            {{ $novel->is_published ? "Unpublish" : "Publish" }}
                        </a>
                        <form class="absolute left-[-99999px]" action="{{ route('publish', ['id' => $novel->id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
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
    const publishBtn = document.querySelectorAll(".publish");
    deleteBtn.forEach(btn => {
        btn.addEventListener("click", (e) => {
        
        e.preventDefault();
        if(confirm("Are you sure you want to delete this novel?")){
            btn.nextElementSibling.submit();
        }
    });        
    });

    publishBtn.forEach(btn => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            if(confirm(`Are you sure you want to ${e.target.innerText.toLowerCase()} this novel?`)){
            btn.nextElementSibling.submit();
        }
    });       
    })
</script>