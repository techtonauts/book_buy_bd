<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Admin - Login | BookBuyBD</title>
</head>

<body>
    <div class="flex items-center justify-center min-h-[94vh] bg-gray-100">
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
            <div class="flex flex-col space-y-4 justify-center items-center mb-8">
                <img src="{{ asset('images/logo.png') }}" alt="BookBuyBD Logo" class="w-32 mx-auto mb-4">
                <h2 class="text-2xl font-bold text-center">Admin Login</h2>
                <p>Login to access the admin panel</p>
            </div>

            <form action="{{ route('admin.login') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500"
                        placeholder="Enter your email">
                </div>
                @error('email')
                    <div class="text-red-500 text-sm text-center my-4 py-2">{{ $message }}</div>
                @enderror

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500"
                        placeholder="Enter your password">
                </div>

                @error('email')
                    <div class="text-red-500 text-center my-4 py-2">{{ $message }}</div>
                @enderror

                @error('credentials')
                    <div class="text-red-500 text-center my-4 py-2">{{ $message }}</div>
                @enderror

                <button type="submit"
                    class="w-full bg-primary border border-primary text-white px-8 py-3 font-medium
                        rounded-md hover:bg-transparent hover:text-primary">Login</button>
            </form>
        </div>

    </div>
    <footer class="bg-gray-800 py-4 text-center text-white min-h-full">
        <p>&copy; 2025 BookBuyBD. All rights reserved.</p>
    </footer>
</body>

</html>
