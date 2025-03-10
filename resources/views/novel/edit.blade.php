<x-layout title="Edit A Novel">
    <div class="w-full max-w-4xl mx-auto p-6">
        <h2 class="text-xl font-semibold mb-4">Edit Novel</h2>
        <form method="post" action="{{ route('novels.update', ['novel'=> $novel->id]) }}">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500"
                    placeholder="Enter title">
                @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500"
                    placeholder="Enter description">
                    {{ old('description') }}
                </textarea>
                @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="w-full bg-cyan-500 text-white p-2 rounded-md hover:bg-cyan-600">Update</button>
        </form>
    </div>

</x-layout>