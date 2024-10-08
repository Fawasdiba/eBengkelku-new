<nav x-data="{ open: false }" class="relative z-10 border-gray-100 bg-opacity-50">
    <!-- Primary Navigation Menu -->
    <div class="w-auto px-4">
        <div class="flex items-center h-24 font-bold">
            <!-- Logo -->
            <div class="shrink-0 flex ms-12">
                <a href="{{ route('beranda') }}">
                    <img src="{{ asset('assets/logo/logo_side.png') }}" alt="" class="block h-10 w-auto fill-current"> 
                </a>
            </div>

            <div class="flex justify-center space-x-8 sm:ms-12">
                <a href="{{ route('beranda') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home mr-2"></i>{{ __('HOME') }}
                </a>
            </div>

            <div class="flex justify-center space-x-8 sm:ms-12">
                <a href="{{ route('beranda') }}" class="{{ request()->routeIs('event') ? 'active' : '' }}">
                    <i class="fas fa-calendar-days mr-2"></i>{{ __('EVENT') }}
                </a>
            </div>

            <div class="flex justify-center space-x-8 sm:ms-12">
                <a href="{{ route('beranda') }}" class="{{ request()->routeIs('workshop') ? 'active' : '' }}">
                    <i class="fa-product-hunt mr-2"></i>{{ __('WORKSHOP') }}
                </a>
            </div>

            <div class="flex justify-center space-x-8 sm:ms-12">
                <a href="{{ route('beranda') }}" class="{{ request()->routeIs('product') ? 'active' : '' }}">
                    <i class="fas fa-building mr-2"></i>{{ __('PRODUCTS & SPARE PARTS') }}
                </a>
            </div>

            <div class="flex justify-center space-x-8 sm:ms-12">
                <a href="{{ route('beranda') }}" class="{{ request()->routeIs('used-car') ? 'active' : '' }}">
                    <i class="fas fa-car mr-2"></i>{{ __('Used Car') }}
                </a>
            </div>
            
            <div class="flex justify-center space-x-8 sm:ms-12">
                @if (Session::has('id_pelanggan'))
                    <!-- Link Profile jika pengguna sudah login -->
                    <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">
                        <i class="fas fa-user mr-2"></i> Profile
                    </a>
                @else
                    <!-- Link Login jika pengguna belum login -->
                    <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">
                        <i class="fas fa-user mr-2"></i> Login
                    </a>
                @endif
            </div>            
            
        </div>
    </div>
</nav>