<nav class="bg-white border-b-4 border-cyan-500 shadow-md">
    <div class="container mx-auto px-4 py-3 flex items-center">


        <div class="flex flex-1 space-x-6">
            <a href="/" class="text-xl font-bold text-gray-800">Wevel</a>
        </div>
        <div class="hidden md:flex space-x-6">
            @if(Route::has("login"))
            @auth
            <div class="relative group">
                <a id="dropdownButton" href="#" class="text-gray-600 hover:text-gray-900">Account &#x25BC;

                </a>


                <div class="hidden absolute left-0 mt-2 w-48 bg-white border border-gray-200" id="dropdownMenu">
                    <a href="{{ route('home') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</a>
                    <a href="{{ route('novels.create') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Create Novel</a>
                    <a href="#" class="logoutBtn block px-4 py-2 text-gray-700 hover:bg-gray-100">Sign Out</a>
                </div>
            </div>
            @else
            <a href="/login" class="text-gray-600 hover:text-gray-900">Login</a>
            @endauth
            @endif
        </div>
        <div class="md:hidden">
            <button class="md:hidden text-gray-800 focus:outline-none" id="menu-btn">
                ☰
            </button>
        </div>
    </div>
    <div class="hidden md:hidden flex flex-col space-y-2 px-4 pb-4" id="mobile-menu">
        @auth
        <a href="{{ route('novels.create') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Create Novel</a>
        <a href="#" class="logoutBtn block px-4 py-2 text-gray-700 hover:bg-gray-100">Sign Out</a>
        @else
        <a href="/login" class="text-gray-600 hover:text-gray-900">Login</a>
        @endauth
    </div>
</nav>
<form id="logoutForm" action="{{ route('logout') }}" method="POST">
    @csrf
</form>
<script>
    @auth
    const menu = document.querySelector('#dropdownMenu');
    const dropdownBtn = document.querySelector('#dropdownButton');
    dropdownBtn.addEventListener('click', (e) => {
        e.preventDefault();
      menu.classList.toggle('hidden');
    });
    const logoutBtns = document.querySelectorAll('.logoutBtn');
    const logOutForm = document.querySelector('#logoutForm');
  
    document.addEventListener('click', (e) => {
      if (!dropdownBtn.contains(e.target) && !menu.contains(e.target)) {
        menu.classList.add('hidden');
      }
    });
   logoutBtns.forEach((btn) => {
     btn.addEventListener("click", (e) => {
        e.preventDefault();
        logOutForm.submit();
    });
   });
    @endauth
    document.querySelector('#menu-btn').addEventListener('click', function () {
        document.querySelector('#mobile-menu').classList.toggle('hidden');
    });
</script>