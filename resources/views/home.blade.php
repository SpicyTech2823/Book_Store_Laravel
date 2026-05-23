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
            <div class="flex items-center gap-2"><i class="fas fa-check-circle text-orange-500"></i><span class="text-sm text-gray-600">{{ $companyInfo['happy_readers'] ?? '20,000' }}+ books</span></div>
            <div class="flex items-center gap-2"><i class="fas fa-truck-fast text-orange-500"></i><span class="text-sm text-gray-600">Free shipping</span></div>
            <div class="flex items-center gap-2"><i class="fas fa-headset text-orange-500"></i><span class="text-sm text-gray-600">{{ $companyInfo['support_hours'] ?? '24/7' }} support</span></div>
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
          <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Book cover" class="h-64 w-auto object-contain drop-shadow-xl">
        </div>
        <div class="p-5">
          <div class="flex items-center text-yellow-400 text-sm mb-1">
            @php
              $rating = $book->star_rating ?? 5;
              $fullStars = floor($rating);
              $hasHalfStar = ($rating - $fullStars) >= 0.5;
            @endphp
            @for($i = 0; $i < 5; $i++)
              @if($i < $fullStars)
                <i class="fas fa-star"></i>
              @elseif($i == $fullStars && $hasHalfStar)
                <i class="fas fa-star-half-alt"></i>
              @else
                <i class="far fa-star"></i>
              @endif
            @endfor
            <span class="text-gray-500 text-xs ml-1">({{ number_format($rating, 1) }})</span>
          </div>
          @if($book->category)
            <p class="text-orange-500 text-sm font-semibold mb-2">{{ $book->category->name }}</p>
          @endif
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
        @foreach($categories as $category)
        <div class="category-card bg-amber-50 rounded-2xl p-5 text-center border border-orange-100 cursor-pointer transition shadow-sm">
          @if($category->icon)
            <i class="fas fa-{{ $category->icon }} text-4xl text-orange-600 mb-3"></i>
          @endif
          <h3 class="font-bold text-gray-700">{{ $category->name }}</h3>
          <p class="text-xs text-gray-500">{{ $category->book_count }} books</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ========== TESTIMONIAL + COMMUNITY SECTION ========== -->
  <section class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 py-20">
    <div class="grid md:grid-cols-2 gap-12 items-center">
      <div class="order-2 md:order-1">
        <span class="text-orange-500 text-sm font-semibold"><i class="fas fa-comment-dots mr-1"></i> Book lovers circle</span>
        <h2 class="text-3xl font-bold text-gray-800 mt-2">What our readers say</h2>
        @if($testimonials->count() > 0)
        @foreach($testimonials as $testimonial)
        <div class="mt-6 bg-white p-6 rounded-2xl shadow-lg border-l-8 border-orange-400">
          <i class="fas fa-quote-left text-orange-300 text-3xl opacity-50 mb-2 block"></i>
          <p class="text-gray-700 italic text-lg">"{{ $testimonial->message }}"</p>
          <div class="flex items-center gap-3 mt-5">
            <div class="w-12 h-12 bg-amber-200 rounded-full flex items-center justify-center"><i class="fas fa-user-alt text-amber-700"></i></div>
            <div><p class="font-bold text-gray-800">— {{ $testimonial->name }}</p><div class="flex text-yellow-400 text-xs">@for($i = 0; $i < $testimonial->rating; $i++)<i class="fas fa-star"></i>@endfor</div></div>
          </div>
        </div>
        @endforeach
        @endif
        <div class="mt-6 flex gap-4 flex-wrap">
          <div class="flex items-center gap-1 bg-white px-4 py-2 rounded-full shadow-sm"><i class="fas fa-globe text-orange-500"></i><span class="text-sm font-medium">{{ $companyInfo['rating'] ?? '10k+' }} ratings</span></div>
          <div class="flex items-center gap-1 bg-white px-4 py-2 rounded-full shadow-sm"><i class="fas fa-trophy text-orange-500"></i><span class="text-sm font-medium">{{ $companyInfo['awards'] ?? 'Award-winning' }} picks</span></div>
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

  <!-- ========== FAQs SECTION ========== -->
  <section class="py-20 bg-gradient-to-b from-white via-orange-50/30 to-white">
    <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12">
      <div class="text-center mb-16">
        <span class="text-orange-500 font-semibold tracking-wide uppercase text-sm"><i class="fas fa-lightbulb mr-2"></i> Got Questions?</span>
        <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mt-3">Frequently Asked Questions</h2>
        <p class="text-gray-600 max-w-2xl mx-auto mt-4">Find answers to common questions about our bookstore, shipping, returns, and more</p>
      </div>

      @if($faqs->count() > 0)
      <div class="max-w-4xl mx-auto">
        <div class="grid gap-4">
          @foreach($faqs as $index => $faq)
          <div class="group faq-item bg-white hover:shadow-xl transition-all duration-300 rounded-xl border-2 border-gray-100 hover:border-orange-200 overflow-hidden">
            <button type="button" class="w-full text-left p-6 md:p-8 flex items-center justify-between hover:bg-orange-50/50 transition-colors duration-200 faq-header">
              <div class="flex-1">
                <h3 class="font-bold text-gray-800 text-lg md:text-xl group-hover:text-orange-600 transition-colors">{{ $faq->question }}</h3>
              </div>
              <div class="ml-6 flex-shrink-0">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-orange-100 group-hover:bg-orange-200 transition-colors duration-200">
                  <i class="fas fa-plus text-orange-600 transition-transform duration-300 faq-icon"></i>
                </div>
              </div>
            </button>
            <div class="faq-answer border-t-2 border-gray-100 bg-gradient-to-b from-orange-50/20 to-white" style="display: none; overflow: hidden;">
              <div class="px-6 md:px-8 py-6 text-gray-600 leading-relaxed">
                {{ $faq->answer }}
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <!-- FAQ Stats -->
        <div class="mt-16 grid grid-cols-3 gap-4 md:gap-8">
          <div class="text-center">
            <div class="text-3xl md:text-4xl font-bold text-orange-600">{{ $faqs->count() }}</div>
            <p class="text-gray-600 text-sm mt-2">Total Questions</p>
          </div>
          <div class="text-center">
            <div class="text-3xl md:text-4xl font-bold text-orange-600">24/7</div>
            <p class="text-gray-600 text-sm mt-2">Instant Answers</p>
          </div>
          <div class="text-center">
            <div class="text-3xl md:text-4xl font-bold text-orange-600">100%</div>
            <p class="text-gray-600 text-sm mt-2">Helpful</p>
          </div>
        </div>
      </div>
      @else
      <div class="max-w-2xl mx-auto text-center bg-white rounded-2xl p-12 border-2 border-dashed border-gray-200">
        <i class="fas fa-question-circle text-5xl text-orange-300 mb-4"></i>
        <p class="text-gray-500 text-lg">No FAQs available yet. Check back soon!</p>
      </div>
      @endif
    </div>
  </section>

  <script>
    document.querySelectorAll('.faq-header').forEach(button => {
      button.addEventListener('click', () => {
        const faqItem = button.parentElement;
        const answer = faqItem.querySelector('.faq-answer');
        const icon = faqItem.querySelector('.faq-icon');
        const isOpen = answer.style.display === 'block';

        // Close all other FAQs
        document.querySelectorAll('.faq-item .faq-answer').forEach(openAnswer => {
          if (openAnswer !== answer) {
            openAnswer.style.display = 'none';
            openAnswer.parentElement.querySelector('.faq-icon').style.transform = 'rotate(0deg)';
          }
        });

        // Toggle current FAQ
        if (isOpen) {
          answer.style.display = 'none';
          icon.style.transform = 'rotate(0deg)';
        } else {
          answer.style.display = 'block';
          icon.style.transform = 'rotate(45deg)';
        }
      });
    });
  </script>
@endsection
