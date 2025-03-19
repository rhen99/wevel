<x-layout>
    <div class="container mx-auto p-6">
        <div class="chapter-content mb-4">
            <a href="{{ route('novels.show', ['novel' => $chapter->novel->id]) }}"
                class="p-1 hover:text-cyan-700 underline">&lt; Go
                Back To Chapters</a>
            <h2 class="text-xl font-semibold mb-4">Chapter {{ $chapter->chapter_number }}
                - {{
                $chapter->title }}</h2>

            {!! $chapter->content !!}
        </div>
        <div class="comment-section">
            @auth
            <form action="#" method="post">
                <input type="hidden" value="">
                <input type="hidden" value="">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Write a comment</label>
                    <textarea name="content"
                        class=" block p-3 w-1/3 resize-none h-32 border border-gray-300 rounded-md focus:ring-cyan-500"></textarea>
                </div>
                <button type="submit"
                    class="text-md font-bold px-4 py-2 bg-cyan-500 text-white hover:bg-cyan-600 rounded-lg">Post
                    Comment</button>
            </form>
            @else
            <p>You need an account to comment. Please <a class="underline  font-semibold hover:text-cyan-500"
                    href="{{ route('login') }}">sign in</a> or <a href="{{ route('register') }}"
                    class="underline font-semibold hover:text-cyan-500">create an account</a>.</p>
            @endauth
        </div>
    </div>
</x-layout>