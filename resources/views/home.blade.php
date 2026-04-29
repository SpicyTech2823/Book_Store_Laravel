@extends('layouts.app')

@section('content')
<!-- ========== HERO SECTION ========== -->
  <section class="relative bg-gradient-to-r from-amber-50 via-orange-50 to-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 py-16 md:py-24">
      <div class="grid md:grid-cols-2 gap-12 items-center">
        <div class="text-center md:text-left">
          <div class="inline-block bg-orange-100 text-orange-800 text-xs font-semibold px-4 py-1.5 rounded-full mb-5">
            <i class="fas fa-star text-xs mr-1"></i>  WELCOME TO YOUR LITERARY HAVEN
          </div>
          <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight text-gray-800">
            Discover <span class="gradient-text">stories</span> <br> that change your world
          </h1>
          <p class="text-gray-600 text-lg mt-5 max-w-md mx-auto md:mx-0">
            Thousands of novels, bestsellers, and hidden gems. Curated just for you.
          </p>
          <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
            <a href="{{ route('shop') }}" class="hero-btn bg-orange-600 hover:bg-orange-700 text-white px-8 py-3 rounded-full font-bold text-lg shadow-lg transition flex items-center justify-center gap-2">
              <i class="fas fa-book-open"></i> Shop Now
            </a>
            <a href="{{ route('contact') }}" class="border-2 border-orange-300 hover:border-orange-500 bg-white text-gray-800 px-8 py-3 rounded-full font-semibold transition flex items-center justify-center gap-2" >
              <i class="fa-solid fa-globe"></i> Connect with us
            </a>
          </div>
          <!-- mini stats -->
          <div class="flex flex-wrap gap-6 justify-center md:justify-start mt-10 ">
            <div class="flex items-center gap-2"><i class="fas fa-check-circle text-orange-500"></i><span class="text-sm text-gray-600">20,000+ books</span></div>
            <div class="flex items-center gap-2"><i class="fas fa-truck-fast text-orange-500"></i><span class="text-sm text-gray-600">Free shipping</span></div>
            <div class="flex items-center gap-2"><i class="fas fa-headset text-orange-500"></i><span class="text-sm text-gray-600">24/7 support</span></div>
          </div>
        </div>
        <!-- Hero image with quote icon -->
        <div class="relative flex justify-center md:justify-end rounded-3xl overflow-hidden">
          <div class="relative w-80 h-80 md:w-96 md:h-96 bg-gradient-to-tr from-orange-200 to-amber-100 flex items-center justify-center shadow-2xl animate-pulse-slow ">
            <img src="{{ asset('images/cover.jpeg') }}" alt="Hero illustration" class="w-full h-full object-cover mix-blend-multiply opacity-90">
            <div class="absolute -bottom-5 -right-5 bg-white p-3 rounded-full shadow-xl">
              <i class="fas fa-quote-right text-orange-500 text-2xl"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="absolute bottom-0 left-0 w-full h-6 bg-gradient-to-t from-white/30 to-transparent"></div>
  </section>

  <!-- ========== FEATURED BOOKS SECTION ========== -->
  <section class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 py-20">
    <div class="text-center mb-12">
      <span class="text-orange-500 font-semibold tracking-wide uppercase text-sm"><i class="fas fa-fire mr-1"></i> Editor’s Pick</span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2">Featured Bestsellers</h2>
      <p class="text-gray-500 max-w-2xl mx-auto mt-3">Curated masterpieces — loved by readers worldwide</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($books as $book)
      <div class="book-card bg-white rounded-2xl shadow-md overflow-hidden transition-all border border-gray-100">
        <div class="relative h-72 bg-gradient-to-br from-rose-100 to-yellow-50 flex items-center justify-center">
          <img src="{{ asset($book->cover_image) }}" alt="Book cover" class="h-64 w-auto object-contain drop-shadow-xl">
        </div>
        <div class="p-5">
          <div class="flex items-center text-yellow-400 text-sm mb-1"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><span class="text-gray-500 text-xs ml-1">(5.0)</span></div>
          <h3 class="font-bold text-gray-800 text-lg">{{ $book->title }}</h3>
          <p class="text-gray-500 text-sm">{{$book->author }}</p>
          
          <div class="flex items-center justify-between mt-3"><span class="font-bold text-orange-600 text-xl">${{ number_format($book->price, 2) }}</span>
          <a href="{{ route('books.show', $book->id) }}" class="text-orange-500 hover:text-orange-600 font-medium ">
            View Detail
          </a>
          </div>
        </div>
      </div>
        @endforeach
    </div>

  </section>

  <!-- ========== CATEGORIES / GENRES SECTION ========== -->
  <section class="bg-white/70 py-16 border-y border-orange-100">
    <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12">
      <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-gray-800">Browse by genre</h2>
        <p class="text-gray-500 mt-2">Find exactly what speaks to your soul</p>
      </div>
      <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-5">
        <div class="category-card bg-amber-50 rounded-2xl p-5 text-center border border-orange-100 cursor-pointer transition shadow-sm">
          <i class="fas fa-dragon text-4xl text-orange-600 mb-3"></i>
          <h3 class="font-bold text-gray-700">Fantasy</h3>
          <p class="text-xs text-gray-500">126 books</p>
        </div>
        <div class="category-card bg-rose-50 rounded-2xl p-5 text-center border border-orange-100 cursor-pointer transition">
          <i class="fas fa-heart text-4xl text-rose-500 mb-3"></i>
          <h3 class="font-bold text-gray-700">Romance</h3>
          <p class="text-xs text-gray-500">98 books</p>
        </div>
        <div class="category-card bg-blue-50 rounded-2xl p-5 text-center border border-orange-100 cursor-pointer transition">
          <i class="fas fa-microchip text-4xl text-blue-600 mb-3"></i>
          <h3 class="font-bold text-gray-700">Sci-Fi</h3>
          <p class="text-xs text-gray-500">203 books</p>
        </div>
        <div class="category-card bg-emerald-50 rounded-2xl p-5 text-center border border-orange-100 cursor-pointer transition">
          <i class="fas fa-landmark text-4xl text-emerald-700 mb-3"></i>
          <h3 class="font-bold text-gray-700">History</h3>
          <p class="text-xs text-gray-500">85 books</p>
        </div>
        <div class="category-card bg-purple-50 rounded-2xl p-5 text-center border border-orange-100 cursor-pointer transition">
          <i class="fas fa-brain text-4xl text-purple-600 mb-3"></i>
          <h3 class="font-bold text-gray-700">Psychology</h3>
          <p class="text-xs text-gray-500">64 books</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== TESTIMONIAL + COMMUNITY SECTION ========== -->
  <section class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 py-20">
    <div class="grid md:grid-cols-2 gap-12 items-center">
      <div class="order-2 md:order-1">
        <span class="text-orange-500 text-sm font-semibold"><i class="fas fa-comment-dots mr-1"></i> Book lovers circle</span>
        <h2 class="text-3xl font-bold text-gray-800 mt-2">What our readers say</h2>
        <div class="mt-6 bg-white p-6 rounded-2xl shadow-lg border-l-8 border-orange-400">
          <i class="fas fa-quote-left text-orange-300 text-3xl opacity-50 mb-2 block"></i>
          <p class="text-gray-700 italic text-lg">"Paperbound completely transformed my reading journey. The recommendations are spot-on and delivery is blazing fast!"</p>
          <div class="flex items-center gap-3 mt-5">
            <div class="w-12 h-12 bg-amber-200 rounded-full flex items-center justify-center"><i class="fas fa-user-alt text-amber-700"></i></div>
            <div><p class="font-bold text-gray-800">— Elena M.</p><div class="flex text-yellow-400 text-xs"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div></div>
          </div>
        </div>
        <div class="mt-6 flex gap-4 flex-wrap">
          <div class="flex items-center gap-1 bg-white px-4 py-2 rounded-full shadow-sm"><i class="fas fa-globe text-orange-500"></i><span class="text-sm font-medium">10k+ ratings</span></div>
          <div class="flex items-center gap-1 bg-white px-4 py-2 rounded-full shadow-sm"><i class="fas fa-trophy text-orange-500"></i><span class="text-sm font-medium">Award-winning picks</span></div>
        </div>
      </div>
      <div class="order-1 md:order-2 flex justify-center">
        <div class="relative bg-orange-100 rounded-3xl p-4 w-80">
          <img src="{{ asset('images/atomic_habits.jpg') }}"
           alt="testimonial collage" class="rounded-2xl shadow-2xl">
          <div class="absolute -top-4 -right-4 bg-white p-2 rounded-full shadow-md"><i class="fas fa-crown text-orange-400 text-xl"></i></div>
        </div>
      </div>
    </div>
  </section>
@endsection
