@extends('layouts.app')

@section('content')
<section class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 py-10">
    <div class="text-center mb-12 border-b border-gray-200 pb-6 border-dashed">
        <h2>Find Your Favourite <span class="text-orange-500">Books</span></h2>
        <!-- search -->
        <div class="mt-4 flex items-center gap-3">
            <input type="text" placeholder="Search for books, authors..." class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-orange-500 focus:border-orange-500">
            <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition">Search</button>
        </div>
    </div>
    <h1 class="text-3xl font-bold mb-6">Shop Our Collection</h1>
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

@endsection
@section('scripts')
<script>
    // Confirm submission
</script>    
@endsection    


