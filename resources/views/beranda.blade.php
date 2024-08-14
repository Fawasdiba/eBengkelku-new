@extends('layouts.app')

<div class="relative min-h-screen bg-local">      
    <div class="absolute inset-0 flex flex-col items-center justify-center bg-cover" 
    style="background-image:url({{ asset('assets/images/image.png') }});">
    </div>
        <div class="absolute inset-x-0 bottom-0 h-full bg-gradient-to-tl from-transparent to-white backdrop-blur-lg"></div>
        @include('layouts.navbar')
    <div class="absolute inset-0 flex flex-col items-center justify-center bg-cover">
        <img src="{{ asset('assets/logo/logo 3.png') }}" alt="Centered Image" class="h-auto mb-6" style="max-width: 25%">
        <p class="text-blue-500 text-2xl font-bold">Saling Support</p>
        <a href="{{ route('register.submit') }}" class="bg-blue-500 text-white text-lg font-bold px-8 py-3 rounded-2xl hover:bg-blue-600 mt-6">
            REGISTER NOW
        </a>
     </div>
</div>
