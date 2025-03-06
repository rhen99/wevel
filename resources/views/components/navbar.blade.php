<nav class="bg-white border-b-4 border-cyan-500 shadow-md">
    <div class="container mx-auto px-4 py-3 flex items-center">
        <a href="/" class="text-xl font-bold text-gray-800">Wevel</a>

        <div class="hidden md:flex md:flex-1 space-x-6">
        </div>
        <div class="hidden md:flex space-x-6">
            @if(Route::has("login"))
            @auth
            <div class="relative group">
                <button id="dropdownButton" class="text-gray-600 hover:text-gray-900">Account &#x25BC;

                </button>


                <div class="hidden absolute left-0 mt-2 w-48 bg-white border border-gray-200" id="dropdownMenu">
                    <a href="{{ route('novels.create') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Create Novel</a>
                    <a href="#" id="logoutBtn" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Sign Out</a>
                </div>
            </div>
            <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
            @else
            <a href="/login" class="text-gray-600 hover:text-gray-900">Login</a>
            @endauth
            @endif
        </div>
    </div>
</nav>
@auth
<script>
    const button = document.querySelector('#dropdownButton');
    const logoutBtn = document.querySelector('#logoutBtn');
    const menu = document.querySelector('#dropdownMenu');
    const logOutForm = document.querySelector('#logoutForm');
  
    button.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  
    document.addEventListener('click', (e) => {
      if (!button.contains(e.target) && !menu.contains(e.target)) {
        menu.classList.add('hidden');
      }
    });
    logoutBtn.addEventListener("click", (e) => {
        e.preventDefault();
        logOutForm.submit();
    });
</script>
@endauth