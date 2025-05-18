<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Page specific meta tags --}}
    @yield('meta')

    <title>BookBuyBD | @yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <!-- Top Announcement Bar -->
    <div class="bg-primary text-white py-2 overflow-hidden">
        <div class="flex-1">
            <p class="marquee">B/W Printing @ ৳0.75 per page | Free Delivery on orders over ৳1000 | <a
                    href="#">Shop Now</a></p>
        </div>
    </div>


    <!-- Header Section -->

    @include('components.home.header')

    <!-- Navbar Section -->
    @include('components.home.nav')


    <!-- Main Content -->

    @yield('content')

    <!-- ./Main Content -->

    <!-- footer -->
    <footer class="bg-primary pt-16 pb-12 border-t border-gray-100">
        @include('components.home.footer')
    </footer>
    <!-- ./footer -->

    <!-- copyright -->
    <div class="bg-gray-800 py-4">
        <div class="container flex items-center justify-between">
            <p class="text-white">&copy;2025 BookBuyBD - All Right Reserved</p>
            <div>
                <img src="assets/images/methods.png" alt="methods" class="h-5">
            </div>
        </div>
    </div>

    <!-- Scripts -->

    @yield('scripts')

    <script src="script.js"></script>
    <script src="assets/js/payment.js"></script>
    <script src="assets/js/cart.js"></script>

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXX-Y"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-XXXXX-Y');
    </script>
</body>

</html>
