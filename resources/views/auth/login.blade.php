@extends('layouts.app')

@section('content')
<section class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 py-10">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="{{ route('home') }}" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
            <i class="fas fa-book-open text-orange-500 text-2xl mr-2"></i>
            <span class="font-bold text-2xl">
                Paper<span class="text-orange-500">bound</span>
            </span>
        </a>
        <div class="w-full bg-white rounded-lg shadow-2xl  md:mt-0 sm:max-w-md xl:p-0 transform hover:scale-105 transition duration-300">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                    Sign in to your account
                </h1>
                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="relative">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-lg">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-r-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5" placeholder="name@company.com" required="">
                        </div>
                    </div>
                    <div class="relative">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-lg">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-r-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5" required="">
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                              <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-orange-300" name="remember">
                            </div>
                            <div class="ml-3 text-sm">
                              <label for="remember" class="text-gray-500">Remember me</label>
                            </div>
                        </div>
                        <a href="#" class="text-sm font-medium text-orange-600 hover:underline">Forgot password?</a>
                    </div>
                    <button type="submit" class="w-full text-white bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-lg hover:shadow-xl transition duration-300">Sign in</button>
                    <p class="text-sm font-light text-gray-500">
                        Don't have an account yet? <a href="{{ route('register') }}" class="font-medium text-orange-600 hover:underline">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
