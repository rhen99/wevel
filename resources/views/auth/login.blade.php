<x-layout>
    <div class="h-screen flex justify-center items-center">
        <div class="w-full max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-4 text-center">Sign In</h2>

            <form action="{{ route('authUser') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Email</label>
                    <input type="email" name="email"
                        class="w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300"
                        value="{{ old('email') }}" required>
                    @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Password</label>
                    <input type="password" name="password"
                        class="w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300" required>
                    @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="w-full bg-cyan-500 text-white py-2 rounded hover:bg-cyan-600 transition">
                    Sign In
                </button>
                <p class="text-center text-gray-600 mt-4">
                    Don't have an account? <a href="/register" class="text-cyan-500 hover:underline">Register</a>
                </p>
            </form>
        </div>
    </div>
</x-layout>