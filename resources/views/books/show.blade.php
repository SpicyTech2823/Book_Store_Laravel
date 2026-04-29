@extends('layouts.app')

@section('content')
<section class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 py-10">
    <div class="text-center mb-12 border-b border-gray-200 pb-6 border-dashed">
        <h2>Book Detail</h2>
    </div>
    <div class="flex flex-col md:flex-row gap-8">
        <div class="w-full md:w-1/3 bg-gradient-to-br from-rose-100 to-yellow-50 rounded-2xl p-5 flex items-center justify-center">
            <img src="{{ asset($book->cover_image) }}" alt="Book cover" class="h-96 w-auto object-contain drop-shadow-xl">
        </div>
        <div class="w-full md:w-2/3">
            <h1 class="text-3xl font-bold mb-4">{{ $book->title }}</h1>
            <p class="text-gray-500 text-lg mb-4">by {{ $book->author }}</p>
            <div class="flex items-center text-yellow-400 text-sm mb-4"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><span class="text-gray-500 text-xs ml-1">(5.0)</span></div>
            <p class="text-gray-700 text-lg mb-6">{{ $book->description }}</p>
            <div class="flex items-baseline gap-4">
                <span class="font-bold text-orange-600 text-2xl">${{ number_format($book->price, 2) }}</span>
                <form action="{{ route('cart.add', $book->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
