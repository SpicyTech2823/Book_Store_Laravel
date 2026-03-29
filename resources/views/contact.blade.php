@extends('layouts.app')

@section('content')
<section class="relative bg-gradient-to-r from-amber-50 via-orange-50 to-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 py-20 md:py-24">
      <div class="text-center max-w-3xl mx-auto">
        <span class="inline-block bg-orange-100 text-orange-800 text-xs font-semibold px-4 py-1.5 rounded-full mb-5">
          <i class="fas fa-envelope mr-1"></i> Get in touch
        </span>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-gray-800">
          Let’s <span class="gradient-text">connect</span> over stories
        </h1>
        <p class="text-gray-600 text-lg mt-6 max-w-2xl mx-auto">
          Have a question, book suggestion, or just want to say hello? We’d love to hear from you. Our team of book lovers is here to help.
        </p>
      </div>
    </div>
    <div class="absolute bottom-0 left-0 w-full h-6 bg-gradient-to-t from-white/30 to-transparent"></div>
  </section>

  <!-- ========== CONTACT FORM & INFO SECTION ========== -->
    <section class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 py-16">
        <div class="grid md:grid-cols-2 gap-15 items-start">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Get In Touch</h2>
                <p class="text-gray-600 mt-4">Whether you have a question about an order, need book <br>recommendations,or just want to chat about your latest read, our friendly support team is ready to assist you.</br>   </p>
                <ul class="mt-6 space-y-3 text-gray-700">
                    <li class="flex items-start gap-4"><i class="fas fa-phone text-orange-500 mt-1"></i><span><strong>Phone:</strong> (555) 123-4567</span></li>
                    <li class="flex items-start gap-4"><i class="fas fa-envelope text-orange-500 mt-1"></i><span><strong>Email:</strong> support@bookstore.com</span></li>
                    <li class="flex items-start gap-4"><i class="fas fa-clock text-orange-500 mt-1"></i><span><strong>Hours:</strong> Mon-Fri 9am-6pm, Sat 10am-4pm</span></li>
                </ul>
                
            </div>


        <!-- Contact form -->
        <div>
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Contact Form</h2>
            <form class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" required class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500">
            </div>
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea id="message" name="message" rows="4" required class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500"></textarea>
            </div>
            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold px-6 py-3 rounded-full transition ">Send Message</button>
            </form>
        </div>
    </section>    
    
    
  <!-- ========== FAQ / HELPFUL LINKS SECTION ========== -->
  <section class="bg-white/70 py-16 border-y border-orange-100">
    <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12">
      <div class="text-center mb-10">
        <span class="text-orange-500 font-semibold text-sm"><i class="fas fa-question-circle mr-1"></i> Quick answers</span>
        <h2 class="text-3xl font-bold text-gray-800 mt-2">Frequently asked questions</h2>
        <p class="text-gray-500 max-w-2xl mx-auto mt-2">Find answers to common inquiries below, or reach out directly.</p>
      </div>
      <div class="grid md:grid-cols-2 gap-6 max-w-4xl mx-auto">
        <div class="bg-white rounded-xl p-5 shadow-sm border border-orange-50">
          <i class="fas fa-truck-fast text-orange-500 text-xl mb-2"></i>
          <h3 class="font-bold text-gray-800">Shipping times & costs</h3>
          <p class="text-gray-500 text-sm mt-1">Free US shipping on orders $35+. Usually 3-7 business days. International shipping available.</p>
        </div>
        <div class="bg-white rounded-xl p-5 shadow-sm border border-orange-50">
          <i class="fas fa-undo-alt text-orange-500 text-xl mb-2"></i>
          <h3 class="font-bold text-gray-800">Return policy</h3>
          <p class="text-gray-500 text-sm mt-1">Love it or return within 30 days for a full refund. Damaged books? We’ll replace immediately.</p>
        </div>
        <div class="bg-white rounded-xl p-5 shadow-sm border border-orange-50">
          <i class="fas fa-gem text-orange-500 text-xl mb-2"></i>
          <h3 class="font-bold text-gray-800">Book subscriptions</h3>
          <p class="text-gray-500 text-sm mt-1">Yes! Join our monthly "First Edition" box – personalized picks delivered to your door.</p>
        </div>
        <div class="bg-white rounded-xl p-5 shadow-sm border border-orange-50">
          <i class="fas fa-chalkboard-user text-orange-500 text-xl mb-2"></i>
          <h3 class="font-bold text-gray-800">Author events</h3>
          <p class="text-gray-500 text-sm mt-1">We host virtual and in-person readings. Check our events page or subscribe for updates.</p>
        </div>
      </div>
      <div class="text-center mt-8">
        <a href="#" class="text-orange-600 font-medium inline-flex items-center gap-1 hover:underline">View all FAQs <i class="fas fa-arrow-right text-xs"></i></a>
      </div>
    </div>
  </section>

  <!-- ========== MAP & STORE HOURS ========== -->
  <section class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 py-16">
    <div class="grid md:grid-cols-2 gap-10 items-center">
      <div>
        <span class="text-orange-500 text-sm font-semibold"><i class="fas fa-store mr-1"></i> Our flagship</span>
        <h2 class="text-3xl font-bold text-gray-800 mt-2">Visit our cozy bookshop</h2>
        <p class="text-gray-600 mt-4">Located in the heart of Seattle's literary district, our physical store is a haven for book lovers. Come for the stories, stay for the hand-brewed coffee and friendly cats.</p>
        <ul class="mt-6 space-y-2">
          <li class="flex items-start gap-3"><i class="fas fa-clock text-orange-500 mt-1"></i><span><strong>Store hours:</strong> Mon–Sat 10am–8pm, Sun 11am–6pm</span></li>
          <li class="flex items-start gap-3"><i class="fas fa-calendar-alt text-orange-500 mt-1"></i><span><strong>Special events:</strong> Weekly storytime for kids, author signings every first Friday</span></li>
          <li class="flex items-start gap-3"><i class="fas fa-parking text-orange-500 mt-1"></i><span><strong>Parking:</strong> Free parking behind the building</span></li>
        </ul>
        <button class="mt-6 border border-orange-300 text-orange-700 font-medium px-5 py-2 rounded-full hover:bg-orange-50 transition">Plan your visit →</button>
      </div>
      <div class="relative h-64 md:h-80 rounded-2xl overflow-hidden shadow-xl border border-orange-100">
        <!-- Static map placeholder (Google Maps style) -->
        <div class="w-full h-full bg-gray-200 flex items-center justify-center bg-gradient-to-br from-amber-100 to-orange-100">
          <div class="text-center p-4">
            <i class="fas fa-map-marked-alt text-5xl text-orange-600 mb-2"></i>
            <p class="text-gray-700 font-medium">123 Storybook Lane, Seattle, WA</p>
            <p class="text-sm text-gray-500 mt-1">📍 Interactive map coming soon — find us easily!</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  
@endsection
