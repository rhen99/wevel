<x-layout>
    <div class="container mx-auto p-6">
        <a href="{{ route('novels.show', ['novel' => $chapter->novel->id]) }}"
            class="p-1 hover:text-cyan-700 underline">&lt; Go
            Back To Chapters</a>
        <h2 class="text-xl font-semibold mb-4">Chapter {{ $chapter->chapter_number }}
            - {{
            $chapter->title }}</h2>

        {!! $chapter->content !!}

    </div>
</x-layout>