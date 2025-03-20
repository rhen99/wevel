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
            <form class="mb-4" action="{{ route('comments.store', ['chapter' => $chapter->id]) }}" method="post">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Write a comment</label>
                    <textarea name="content"
                        class=" block p-3 w-1/3 resize-none h-32 border border-gray-300 rounded-md focus:ring-cyan-500"></textarea>
                    @error('content') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <button type="submit"
                    class="text-md font-bold px-4 py-2 bg-cyan-500 text-white hover:bg-cyan-600 rounded-lg">Post
                    Comment</button>
            </form>
            @else
            <p class="mb-4">You need an account to comment. Please <a
                    class="underline  font-semibold hover:text-cyan-500" href="{{ route('login') }}">sign in</a> or <a
                    href="{{ route('register') }}" class="underline font-semibold hover:text-cyan-500">create an
                    account</a>.</p>
            @endauth
            <div class="comments">
                <h2 class="mb-4 text-xl font-semibold">Comments</h2>
                @foreach ($chapter->comments as $comment)
                <div class="bg-gray-200 p-3">
                    <h3 class="text-base font-semibold">{{ $comment->name }}</h3>
                    <h3 class="text-xs">{{ $comment->username }}</h3>
                    <p class="py-2">
                        {{ $comment->content }}
                    </p>
                    @auth
                    <div class="comment-actions flex space-x-3">
                        @if (auth()->user()->id === $comment->user_id)
                        <a href="#" class="underline deleteBtn hover:text-red-700">Delete</a>
                        <form
                            action="{{ route('comments.destroy', ['chapter' => $chapter->id, 'comment' => $comment->id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        @endif
                    </div>
                    @endauth
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
<script>
    const deleteBtn = document.querySelectorAll(".deleteBtn");
    deleteBtn.forEach(btn => {
        btn.addEventListener("click", (e) => {
        e.preventDefault();
        if(confirm("Are you sure you want to delete this comment?")){
            btn.nextElementSibling.submit();
        }
    });        
    });
</script>