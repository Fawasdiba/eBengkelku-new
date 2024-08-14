<nav x-data="{ open: false }" class="relative z-10 border-gray-100 bg-opacity-50">
    <!-- Primary Navigation Menu -->
    <div class="w-auto px-4">
        <div class="flex items-center h-24 font-bold">
            <!-- Logo -->
            <div class="shrink-0 flex ms-12">
                <a href="{{ url('welcome') }}">
                    <img src="{{ asset('assets/logo/logo_side.png') }}" alt="" class="block h-10 w-auto fill-current"> 
                </a>
            </div>

            <!-- Menu Links -->
            <div class="flex justify-center space-x-8 sm:ms-12">
                <a href="{{ url('welcome') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home mr-2"></i>{{ __('HOME') }}
                </a>

                <a href="{{ url('welcome') }}" class="{{ request()->routeIs('event') ? 'active' : '' }}">
                    <i class="fas fa-calendar-days mr-2"></i>{{ __('EVENT') }}
                </a>

                <a href="{{ url('welcome') }}" class="{{ request()->routeIs('workshop') ? 'active' : '' }}">
                    <i class="fa-product-hunt mr-2"></i>{{ __('WORKSHOP') }}
                </a>

                <a href="{{ url('welcome') }}" class="{{ request()->routeIs('products') ? 'active' : '' }}">
                    <i class="fas fa-building mr-2"></i>{{ __('PRODUCTS & SPARE PARTS') }}
                </a>

                <a href="{{ url('welcome') }}" class="{{ request()->routeIs('used-car') ? 'active' : '' }}">
                    <i class="fas fa-car mr-2"></i>{{ __('Used Car') }}
                </a>
            </div>
            
            <!-- User Info or Login -->
            <div class="flex justify-center space-x-8 sm:ms-12">
                @if (Auth::check())
                    <span>
                        <i class="fas fa-user mr-2"></i>{{ Auth::user()->name }}
                    </span>
                @else
                    <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">
                        <i class="fas fa-user mr-2"></i>{{ __('Login') }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>
