@extends('layouts.app')

@section('content')
    <div class="contain py-16">
        <div class="max-w-lg mx-auto shadow-md px-6 py-7 rounded-md overflow-hidden">
            <div class="flex flex-col items-center justify-center mb-2 space-y-4">
                <h2 class="text-2xl uppercase font-medium mb-1">Create an account</h2>
                <p class="text-gray-600 mb-6 text-sm">
                    Register for a new account.
                </p>
            </div>
            <form action="{{ route('register') }}" method="post" autocomplete="off">
                @csrf
                <div class="space-y-3">
                    <div>
                        <label for="name" class="text-gray-600 mb-2 block">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded-md focus:ring-0 focus:border-primary placeholder-gray-400"
                            placeholder="Your name...">
                    </div>
                    @error('name')
                        <div class="text-red-500 text-muted-foreground py-2">{{ $message }}</div>
                    @enderror
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
                    <div>
                        <label for="password_confirmation" class="text-gray-600 mb-2 block">Confirm password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded-md focus:ring-0 focus:border-primary placeholder-gray-400"
                            placeholder="*******">
                    </div>
                    @error('password_confirmation')
                        <div class="text-red-500 text-muted-foreground py-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-6">
                    <div class="flex items-center">
                        <input type="checkbox" name="terms" id="terms"
                            class="text-primary focus:ring-0 rounded-md-sm cursor-pointer">
                        <label for="terms" class="text-gray-600 ml-3 cursor-pointer">I have read and agree to the <a
                                href="#" class="text-primary">terms & conditions</a></label>
                    </div>
                </div>
                @error('terms')
                    <div class="text-red-500 text-muted-foreground py-2">{{ $message }}</div>
                @enderror
                <div class="mt-4">
                    <button type="submit"
                        class="block w-full py-2 text-center text-white bg-primary border border-primary rounded-md hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">create
                        account</button>
                </div>
            </form>

            <p class="mt-4 text-center text-gray-600">Already have account? <a href="{{ route('show.login') }}"
                    class="text-primary">Login
                    now</a></p>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @elseif (session('error'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
@endsection
