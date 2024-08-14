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

        <!-- Register Form -->
        <form id="register-form" action="{{ route('register.submit') }}" method="POST">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="nama" class="block text-lg font-medium text-gray-700">Full Name</label>
                <input placeholder="Your Name" id="nama" class="mt-2 block w-full border-gray-400 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" type="text" name="nama" required autofocus autocomplete="username">
                @error('nama')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone -->
            <div class="mb-4">
                <label for="telp" class="block text-lg font-medium text-gray-700">Phone</label>
                <input placeholder="Your Phone" id="telp" class="mt-1 block w-full border-gray-400 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" type="text" name="telp" required autofocus autocomplete="telp">
                @error('telp')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                <input placeholder="Your Email" id="email" class="mt-1 block w-full border-gray-400 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" type="email" name="email" required autofocus autocomplete="username">
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

            <!-- Password Confirm -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-lg font-medium text-gray-700">Confirm Password</label>
                <input placeholder="Confirm Password" id="password_confirmation" class="mt-1 block w-full border-gray-400 rounded-md shadow-sm focus:ring-indigo-500 sm:text-sm" type="password" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between mt-5">
                <a id="switch-to-login" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">
                    Already registered?
                </a>
                <button type="submit" class="ms-4 bg-blue-500 text-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm py-2 px-4">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const switchToLogin = document.getElementById('switch-to-login');
        
        if (switchToLogin) {
            switchToLogin.addEventListener('click', function() {
                window.location.href = "{{ route('login') }}"; 
            });
        }
    });
</script>
