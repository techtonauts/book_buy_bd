@extends('layouts.app')

@section('content')
    <div class="contain py-16">
        <div class="max-w-lg mx-auto shadow-md px-6 py-7 rounded-md overflow-hidden">
            <div class="flex flex-col items-center justify-center mb-2 space-y-4">
                <h2 class="text-2xl uppercase font-medium mb-1">Login</h2>
                <p class="text-gray-600 mb-6 text-sm">
                    Welcome back! Please login to your account.
                </p>
            </div>
            <form action="{{ route('login') }}" method="post" autocomplete="off">
                @csrf
                <div class="space-y-3">
                    <div>
                        <label for="email" class="text-gray-600 mb-2 block">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded-md focus:ring-0 focus:border-primary placeholder-gray-400"
                            placeholder="youremail.@domain.com">
                    </div>
                    @error('email')
                        <div class="text-red-500 text-muted-foreground py-2">{{ $message }}</div>
                    @enderror
                    <div>
                        <label for="password" class="text-gray-600 mb-2 block">Password</label>
                        <input type="password" name="password" id="password" required
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded-md focus:ring-0 focus:border-primary placeholder-gray-400"
                            placeholder="*******">
                    </div>
                    @error('password')
                        <div class="text-red-500 text-muted-foreground py-2">{{ $message }}</div>
                    @enderror
                    @error('credentials')
                        <div class="bg-red-200 text-red-600 text-muted-foreground text-center p-2 my-2">{{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember"
                            class="text-primary focus:ring-0 rounded-md-sm cursor-pointer">
                        <label for="remember" class="text-gray-600 ml-3 cursor-pointer">Remember me</label>
                    </div>
                    <a href="#" class="text-primary">Forgot password?</a>
                </div>
                <div class="mt-4">
                    <button type="submit"
                        class="block w-full py-2 text-center text-white bg-primary border border-primary rounded-md hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">Login</button>
                </div>
            </form>

            <p class="mt-4 text-center text-gray-600">Don't have an account? <a href="{{ route('show.register') }}"
                    class="text-primary">Register
                    now</a></p>
        </div>
    </div>
@endsection
