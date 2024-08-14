@extends('layouts.app')
@include('layouts.navbar')

<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-6 border-black">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/images/icon.png') }}" alt="Logo" class="h-24 w-24">
            </a>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 p-4 text-black rounded-lg dark:text-green-400" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <!-- Login Form -->
        <form id="login-form" method="POST" action="{{ route('auth.signin') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                <input placeholder="Your Email" id="email" class="mt-1 block w-full border-gray-400 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-lg font-medium text-gray-700">Password</label>
                <input placeholder="Your Password" id="password" class="mt-1 block w-full border-gray-400 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" type="password" name="password" required autocomplete="current-password">
                @error('password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <input id="remember_me" type="checkbox" class="rounded border-gray-400 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <label for="remember_me" class="ml-2 text-bold">Remember me</label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a class="text-lg text-black hover:text-gray-900 dark:hover:text-gray-200 underline" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif

                <button type="submit" class="ms-4 bg-blue-500 text-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-lg px-4 py-2">
                    Log in
                </button>
                <div class="flex items-center justify-center mt-4">
                    <a id="switch-to-register" class="text-blue-500 hover:text-blue-700 cursor-pointer">
                        Need an account?
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const switchToRegister = document.getElementById('switch-to-register');
        
        if (switchToRegister) {
            switchToRegister.addEventListener('click', function() {
                window.location.href = "{{ route('register.submit') }}";
            });
        }
    });
</script>
