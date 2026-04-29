@extends('layouts.app')

@section('content')
<section class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 py-10">
    <div class="mb-8">
        <h1 class="text-4xl font-bold mb-2">Shopping <span class="text-orange-500">Cart</span></h1>
        <p class="text-gray-600">Review your items and proceed to checkout</p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) > 0)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Product</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Price</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Quantity</th>
                                <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">Total</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Action</th>
                            </tr>
                        </thead>
                        <tbody divide-y>
                            @foreach($cart as $id => $item)
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-800">{{ $item['name'] }}</div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="text-orange-600 font-semibold">${{ number_format($item['price'], 2) }}</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <form action="{{ route('cart.decrease', $id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="bg-gray-200 hover:bg-gray-300 px-2 py-1 rounded transition">-</button>
                                        </form>
                                        <input type="text" value="{{ $item['quantity'] }}" readonly class="w-12 text-center border border-gray-300 rounded py-1">
                                        <form action="{{ route('cart.increase', $id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="bg-gray-200 hover:bg-gray-300 px-2 py-1 rounded transition">+</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <span class="font-bold text-gray-800">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                    <h2 class="text-xl font-bold mb-6">Order Summary</h2>
                    
                    <div class="space-y-4 mb-6 pb-6 border-b">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal:</span>
                            <span class="font-semibold">${{ number_format(array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart)), 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping:</span>
                            <span class="font-semibold text-green-500">FREE</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tax:</span>
                            <span class="font-semibold">${{ number_format(array_sum(array_map(function($item) { return $item['price'] * $item['quantity'] * 0.08; }, $cart)), 2) }}</span>
                        </div>
                    </div>

                    <div class="mb-6">
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold">Total:</span>
                            <span class="text-2xl font-bold text-orange-600">${{ number_format(array_sum(array_map(function($item) { return $item['price'] * $item['quantity'] * 1.08; }, $cart)), 2) }}</span>
                        </div>
                    </div>
                    <a href="{{ route('checkout') }}" class="block w-full text-center bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-lg transition mb-3">
                        Proceed to Checkout
                    </a>
                    <a href="{{ route('shop') }}" class="block w-full text-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-3 rounded-lg transition">
                        Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-16">
            <i class="fas fa-shopping-cart text-6xl text-gray-300 mb-4"></i>
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Your cart is empty</h2>
            <p class="text-gray-600 mb-8">Start adding some books to your cart!</p>
            <a href="{{ route('shop') }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-bold px-8 py-3 rounded-lg transition">
                Continue Shopping
            </a>
        </div>
    @endif
</section>
@endsection
