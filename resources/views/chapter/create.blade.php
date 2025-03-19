<x-layout title="Create A Novel">
    <div class="w-full max-w-4xl mx-auto p-6">
        <h2 class="text-xl font-semibold mb-4">Create a New Chapter</h2>
        <form method="post" action="{{ route('chapters.store', ['novel' => $novel->id]) }}">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Chapter Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500"
                    placeholder="Enter title">
                @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Body</label>
                <textarea id="content" name="content" rows="8"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-cyan-500"
                    placeholder="Write your chapter...">{{old('content')}}</textarea>
                @error('content') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="w-full bg-cyan-500 text-white p-2 rounded-md hover:bg-cyan-600">Create
                Chapter</button>
        </form>
    </div>
    <script src="https://cdn.tiny.cloud/1/{{ config('app.tinymce_key') }}/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'advlist autolink lists link charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table help',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
        });
    </script>

</x-layout>