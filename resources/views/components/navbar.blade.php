<nav class="bg-white border-b-4 border-cyan-500 shadow-md">
    <div class="container mx-auto px-4 py-3 flex items-center">
        <a href="/" class="text-xl font-bold text-gray-800">Wevel</a>

        <div class="hidden md:flex md:flex-1 space-x-6">
        </div>
        <div class="hidden md:flex space-x-6">
            @if(Route::has("login"))
            @auth
            <a href="#" class="text-gray-600 hover:text-gray-900">Account</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
            @else
            <a href="/login" class="text-gray-600 hover:text-gray-900">Login</a>
            @endauth
            @endif
        </div>
    </div>
</nav>