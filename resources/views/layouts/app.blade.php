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
    <div class="bg-gradient-to-r from-amber-50 via-orange-50 to-white text-black flex items-center justify-between p-4 shadow-md">

    <!-- Left Logo -->
    <div class="w-1/3 flex items-center space-x-2">
        <i class="fas fa-book-open text-orange-500 text-2xl"></i>
        <span class="font-bold text-xl">
            Paper<span class="text-orange-500">bound</span>
        </span>
    </div>

    <!-- Center Menu -->
    <div class="w-1/3 flex justify-center gap-8 font-medium">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('shop') }}">Shop</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('contact') }}">Contact</a>
    </div>

    <!-- Login and sign up -->
    <div class="w-1/3 flex gap-4">
        <button onclick="openLogin()" class="px-4 py-2 bg-orange-500 text-white rounded cursor-pointer">Login</button>
        <button onclick="openSignup()" class="px-4 py-2 border border-orange-500 text-orange-500 rounded cursor-pointer">Sign Up</button>
    </div>
</div>
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
</body>
</html>