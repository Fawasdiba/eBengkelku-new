@extends('layouts.app')

<nav x-data="{ open: false }" class="relative z-10 border-black bg-center" style="background-image: url('{{ asset('assets/images/image.png') }}');">
    <div class="absolute inset-0 bg-white bg-opacity-65"></div>
    <!-- Primary Navigation Menu -->
    <div class="w-auto px-4 relative">
        <div class="flex items-center h-24 font-bold">
            <!-- Logo -->
            <div class="shrink-0 flex ms-12">
                <a href="{{ url('welcome') }}">
                    <img src="{{ asset('assets/logo/logo_side.png') }}" alt="" class="block h-10 w-auto fill-current"> 
                </a>
            </div>

            <div class="flex justify-center space-x-8 sm:ms-12">
                <a href="{{ url('welcome') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home mr-2"></i>{{ __('HOME') }}
                </a>
            </div>

            <div class="flex justify-center space-x-8 sm:ms-12">
                <a href="{{ url('welcome') }}" class="{{ request()->routeIs('event') ? 'active' : '' }}">
                    <i class="fas fa-calendar-days mr-2"></i>{{ __('EVENT') }}
                </a>
            </div>

            <div class="flex justify-center space-x-8 sm:ms-12">
                <a href="{{ url('welcome') }}" class="{{ request()->routeIs('workshop') ? 'active' : '' }}">
                    <i class="fa-product-hunt mr-2"></i>{{ __('WORKSHOP') }}
                </a>
            </div>

            <div class="flex justify-center space-x-8 sm:ms-12">
                <a href="{{ route('product') }}" class="{{ request()->routeIs('product') ? 'active' : '' }}">
                    <i class="fas fa-building mr-2"></i>{{ __('PRODUCTS & SPARE PARTS') }}
                </a>
            </div>

            <div class="flex justify-center space-x-8 sm:ms-12">
                <a href="{{ url('welcome') }}" class="{{ request()->routeIs('used-car') ? 'active' : '' }}">
                    <i class="fas fa-car mr-2"></i>{{ __('Used Car') }}
                </a>
            </div>
            
            <div class="flex justify-center space-x-8 sm:ms-12">
                @if (Auth::check())
                <span>
                    <i class="fas fa-user mr-2"></i>{{ Auth::user()->name }}
                </span>
                @else
                <a href="{{ route('login') }}" active="request()->routeIs('login')">
                    <i class="fas fa-user mr-2"></i>{{ __('Login') }}
                </a>
                @endif
            </div>
        </div>
        <!-- Additional text with spacing -->
        <div class="relative z-20 bg-opacity-70 py-2 text-center font-bold text-lg">
                    PRODUCTS & SPARE PARTS
        </div>
    </div>
</nav>