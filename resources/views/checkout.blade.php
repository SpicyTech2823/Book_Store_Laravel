@extends('layouts.app')

@section('content')
<section class="max-w-2xl mx-auto p-8 rounded-2xl">
    
    <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">
        Checkout Payment
    </h2>

    <form action="{{ route('checkout') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Payment Method -->
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-3">Select Payment Method</h3>
            <div class="grid grid-cols-3 gap-4">
                <label class="border rounded-lg p-4 cursor-pointer hover:border-orange-500">
                    <input type="radio" name="payment_method" value="card" class="mr-2" checked>
                    💳 Card
                </label>

                <label class="border rounded-lg p-4 cursor-pointer hover:border-orange-500">
                    <input type="radio" name="payment_method" value="paypal" class="mr-2">
                    🅿️ PayPal
                </label>

                <label class="border rounded-lg p-4 cursor-pointer hover:border-orange-500">
                    <input type="radio" name="payment_method" value="aba" class="mr-2">
                    🏦 ABA
                </label>
            </div>
        </div>

        <!-- Card Details -->
        <div class=" p-6 rounded-xl">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">
                Credit Card Details
            </h3>

            <div class="space-y-4">
                <!-- Card Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Cardholder Name
                    </label>
                    <input type="text" name="card_name" required
                        class="mt-1 w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500">
                </div>

                <!-- Card Number -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Card Number
                    </label>
                    <input type="text" name="card_number" required
                        placeholder="1234 5678 9012 3456"
                        class="mt-1 w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500">
                </div>

                <!-- Expiry + CVV -->
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label class="block text-sm font-medium text-gray-700">
                            Expiry Date
                        </label>
                        <input type="text" name="expiry_date" placeholder="MM/YY" required
                            class="mt-1 w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500">
                    </div>

                    <div class="w-1/2">
                        <label class="block text-sm font-medium text-gray-700">
                            CVV
                        </label>
                        <input type="text" name="cvv" required
                            class="mt-1 w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500">
                    </div>
                </div>
            </div>
        </div>

        <!-- Billing Address -->
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-3">Billing Address</h3>
            <input type="text" name="address" placeholder="Street Address"
                class="w-full p-3 border rounded-lg mb-3 focus:ring-2 focus:ring-orange-500">

            <div class="flex gap-4">
                <input type="text" name="city" placeholder="City"
                    class="w-1/2 p-3 border rounded-lg focus:ring-2 focus:ring-orange-500">

                <input type="text" name="zip" placeholder="ZIP Code"
                    class="w-1/2 p-3 border rounded-lg focus:ring-2 focus:ring-orange-500">
            </div>
        </div>

        <!-- Submit -->
        <button type="submit"
            class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-xl transition">
            Pay Now
        </button>

        <!-- Security Note -->
        <p class="text-xs text-gray-500 text-center">
            🔒 Your payment is securely processed with encryption.
        </p>
    </form>
</section>
@endsection