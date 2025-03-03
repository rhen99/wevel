<x-layout title="Create An Account">
    <div class="h-screen flex justify-center items-center">
        <div class="w-full max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-4 text-center">Create an Account</h2>

            <form action="{{ route('registerUser') }}" method="POST">
                @csrf


                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Name</label>
                    <input type="text" name="name"
                        class="w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300"
                        value="{{ old('name') }}" required>
                    @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Email</label>
                    <input type="email" name="email"
                        class="w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300"
                        value="{{ old('email') }}" required>
                    @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Username</label>
                    <input type="username" name="username"
                        class="w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300"
                        value="{{ old('username') }}" required>
                    @error('username') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Password</label>
                    <input type="password" name="password"
                        class="w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300" required>
                    @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Confirm Password</label>
                    <input type="password" name="password_confirmation"
                        class="w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300" required>
                </div>
                <button type="submit" class="w-full bg-cyan-500 text-white py-2 rounded hover:bg-cyan-600 transition">
                    Register
                </button>
                <p class="text-center text-gray-600 mt-4">
                    Already have an account? <a href="/login" class="text-cyan-500 hover:underline">Sign In</a>
                </p>
            </form>
        </div>
    </div>
</x-layout>