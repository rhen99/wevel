<x-layout>
    <div class="container mx-auto p-6">
        <h2 class="text-xl font-semibold mb-4">Chapter {{ $chapter->chapter_number }} - {{ $chapter->title }}</h2>

        {!! $chapter->content !!}

    </div>
</x-layout>