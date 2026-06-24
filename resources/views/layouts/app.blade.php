<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book-store</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
<div class="bg-gradient-to-r from-amber-50 via-orange-50 to-white shadow-md">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between h-16">

            <!-- Logo -->
            <a href="/" class="flex items-center space-x-2">
                <i class="fas fa-book-open text-orange-500 text-2xl"></i>
                <span class="font-bold text-xl">
                    Paper<span class="text-orange-500">bound</span>
                </span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex gap-8 font-medium">
                <a href="{{ route('home') }}" class="hover:text-orange-500">Home</a>
                <a href="{{ route('shop') }}" class="hover:text-orange-500">Shop</a>
                <a href="{{ route('about') }}" class="hover:text-orange-500">About</a>
                <a href="{{ route('contact') }}" class="hover:text-orange-500">Contact</a>
            </div>

            <!-- Desktop Right Side -->
            <div class="hidden md:flex items-center gap-4">
                @auth
                    <span class="text-sm font-medium text-gray-700">
                        Welcome, {{ Auth::user()->name }}
                    </span>

                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Admin
                        </a>
                    @endif

                    <a href="{{ route('cart.index') }}"
                        class="relative text-orange-500">
                        <i class="fas fa-shopping-cart text-2xl"></i>
                        <span
                            class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full px-1">
                            {{ count(session()->get('cart', [])) }}
                        </span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                        class="px-4 py-2 border border-orange-500 text-orange-500 rounded hover:bg-orange-600 hover:text-white">
                        Sign Up
                    </a>
                @endauth
            </div>

            <!-- Mobile Burger Button -->
            <button id="menuBtn" class="block md:hidden text-2xl text-orange-500">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden py-4 border-t">

            <div class="flex flex-col gap-4 font-medium">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('shop') }}">Shop</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>

            <div class="mt-4 flex flex-col gap-3">
                @auth
                    <span class="text-sm text-gray-700">
                        Welcome, {{ Auth::user()->name }}
                    </span>

                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded text-center">
                            Admin Dashboard
                        </a>
                    @endif

                    <a href="{{ route('cart.index') }}"
                        class="flex items-center gap-2">
                        <i class="fas fa-shopping-cart text-orange-500"></i>
                        Cart
                        <span
                            class="bg-red-500 text-white text-xs rounded-full px-2">
                            {{ count(session()->get('cart', [])) }}
                        </span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full bg-red-500 text-white py-2 rounded">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-orange-500 text-white px-4 py-2 rounded text-center">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                        class="border border-orange-500 text-orange-500 px-4 py-2 rounded text-center">
                        Sign Up
                    </a>
                @endauth
            </div>

        </div>
    </div>
</div>
</div>
    <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 mt-4">
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 text-center">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded text-center">
                {{ session('error') }}
            </div>
        @endif

    </div>
    <div>
        @yield('content')
    </div>
    <!-- ========== FOOTER ========== -->
  <footer class="bg-gray-900 text-gray-300 pt-16 pb-8 mt-8">
    <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <div>
          <div class="flex items-center space-x-2"><i class="fas fa-book-open text-orange-500 text-2xl"></i><span class="text-white font-bold text-xl">Paper<span class="text-orange-500">bound</span></span></div>
          <p class="mt-4 text-sm">Igniting imagination, one page at a time. Independent bookstore since 2022.</p>
          <div class="flex space-x-4 mt-5"><i class="fab fa-twitter hover:text-orange-400 cursor-pointer text-lg"></i><i class="fab fa-instagram hover:text-orange-400 cursor-pointer text-lg"></i><i class="fab fa-facebook-f hover:text-orange-400 cursor-pointer text-lg"></i></div>
        </div>
        <div><h4 class="text-white font-semibold text-lg mb-4">Explore</h4><ul class="space-y-2 text-sm"><li><a href="#" class="hover:text-orange-400 transition">New Releases</a></li><li><a href="#" class="hover:text-orange-400 transition">Best Sellers</a></li><li><a href="#" class="hover:text-orange-400 transition">Award Winners</a></li><li><a href="#" class="hover:text-orange-400 transition">Book Clubs</a></li></ul></div>
        <div><h4 class="text-white font-semibold text-lg mb-4">Support</h4><ul class="space-y-2 text-sm"><li><a href="#" class="hover:text-orange-400 transition">FAQs</a></li><li><a href="#" class="hover:text-orange-400 transition">Shipping</a></li><li><a href="#" class="hover:text-orange-400 transition">Returns</a></li><li><a href="#" class="hover:text-orange-400 transition">Contact Us</a></li></ul></div>
        <div><h4 class="text-white font-semibold text-lg mb-4">Get the app</h4><div class="flex space-x-3"><button class="bg-gray-800 hover:bg-gray-700 p-2 rounded-lg flex items-center gap-2"><i class="fab fa-apple text-xl"></i><span class="text-xs">App Store</span></button><button class="bg-gray-800 hover:bg-gray-700 p-2 rounded-lg flex items-center gap-2"><i class="fab fa-google-play text-xl"></i><span class="text-xs">Google Play</span></button></div></div>
      </div>
      <div class="border-t border-gray-800 mt-12 pt-6 text-center text-xs text-gray-500"><p>© 2025 Paperbound Books. Crafted for book lovers — all rights reserved.</p></div>
    </div>
  </footer>
  <script>
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
</body>
</html>