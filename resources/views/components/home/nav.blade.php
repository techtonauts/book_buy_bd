<!-- navbar -->
<nav class="bg-gray-800 mt-0">
    <div class="container flex justify-center items-center">
        <x-frontend.category-navbar />

        <div class="flex items-center justify-between flex-grow md:pl-4 py-1">
            <div class="flex items-center space-x-6 capitalize">
                <a href="{{ route('show.home') }}"
                    class="block px-4 py-2 text-gray-200 hover:text-white hover:border hover:border-gray-700 hover:bg-primary hover:rounded-md transition">
                    Home</a>
                <a href="#"
                    class="block px-4 py-2 text-gray-200 hover:text-white hover:border hover:border-gray-700 hover:bg-primary  hover:rounded-md transition">
                    Shop
                </a>
                <a href="#"
                    class="block px-4 py-2 text-gray-200 hover:text-white hover:border hover:border-gray-700 hover:bg-primary  hover:rounded-md transition">
                    Custom Order
                </a>
                <a href="#"
                    class="block px-4 py-2 text-gray-200 hover:text-white hover:border hover:border-gray-700 hover:bg-primary hover:rounded-md transition">About
                    us</a>
                <a href="#"
                    class="block px-4 py-2 text-gray-200 hover:text-white hover:border hover:border-gray-700 hover:bg-primary hover:rounded-md transition">Contact
                    us</a>
            </div>
            @guest
                <a href="{{ route('show.login') }}"
                    class="block px-4 py-2 text-gray-200 hover:text-white hover:border hover:border-gray-700 hover:bg-primary hover:rounded-md transition">Login</a>
            @endguest
            @auth
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit"
                        class="block px-4 py-2 text-gray-200 hover:text-white hover:border hover:border-gray-700 hover:bg-red-500 hover:rounded-md transition">
                        Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>
<!-- ./navbar -->
