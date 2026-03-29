@extends('layouts.app')

@section('content')
<section class="relative bg-gradient-to-r from-amber-50 via-orange-50 to-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 py-20 md:py-28">
      <div class="text-center max-w-3xl mx-auto">
        <span class="inline-block bg-orange-100 text-orange-800 text-xs font-semibold px-4 py-1.5 rounded-full mb-5">
          <i class="fas fa-leaf mr-1"></i> Our story
        </span>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-gray-800">
          More than a <span class="gradient-text">bookstore</span><br>— a community of dreamers
        </h1>
        <p class="text-gray-600 text-lg mt-6 max-w-2xl mx-auto">
          Since 2022, Paperbound has been curating worlds between pages, connecting readers with stories that inspire, challenge, and comfort.
        </p>
      </div>
    </div>
    <div class="absolute bottom-0 left-0 w-full h-6 bg-gradient-to-t from-white/30 to-transparent"></div>
  </section>

  <!-- ========== MISSION & VALUES SECTION ========== -->
  <section class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 py-20">
    <div class="grid md:grid-cols-2 gap-12 items-center">
      <div class="order-2 md:order-1">
        <div class="inline-block bg-orange-100 text-orange-700 text-sm font-semibold px-4 py-1.5 rounded-full mb-4">
          <i class="fas fa-bullseye mr-1"></i> Our mission
        </div>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 leading-tight">To ignite curiosity, one page at a time.</h2>
        <p class="text-gray-600 mt-5 leading-relaxed">
          We believe books are portals to empathy, knowledge, and pure joy. Paperbound exists to champion diverse voices, hand-pick exceptional reads, and create a welcoming space where every reader finds their next favorite book.
        </p>
        <div class="flex flex-wrap gap-6 mt-8">
          <div class="flex items-start gap-3">
            <i class="fas fa-heart text-orange-500 text-xl mt-1"></i>
            <div><h4 class="font-bold text-gray-800">Curated with care</h4><p class="text-sm text-gray-500">Every title chosen by passionate bibliophiles.</p></div>
          </div>
          <div class="flex items-start gap-3">
            <i class="fas fa-globe text-orange-500 text-xl mt-1"></i>
            <div><h4 class="font-bold text-gray-800">Global community</h4><p class="text-sm text-gray-500">Readers from 30+ countries, united by stories.</p></div>
          </div>
        </div>
      </div>
      <div class="order-1 md:order-2 flex justify-center">
        <div class="relative">
          <div class="w-72 h-72 md:w-80 md:h-80 bg-gradient-to-tr from-orange-200 to-amber-100 rounded-2xl rotate-3 shadow-xl"></div>
          <div class="absolute top-0 left-0 w-72 h-72 md:w-80 md:h-80 bg-white rounded-2xl -rotate-3 shadow-xl flex items-center justify-center overflow-hidden">
            <img src="{{ asset('images/team_work.jpg') }}" alt="Books illustration" class="object-cover w-full h-full opacity-90">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== STATS SECTION (fun numbers) ========== -->
  <section class="bg-white border-y border-orange-100 py-14">
    <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div><div class="text-4xl md:text-5xl font-black text-orange-600 stat-number">20k+</div><p class="text-gray-600 mt-1">Happy readers</p></div>
        <div><div class="text-4xl md:text-5xl font-black text-orange-600 stat-number">350+</div><p class="text-gray-600 mt-1">Independent publishers</p></div>
        <div><div class="text-4xl md:text-5xl font-black text-orange-600 stat-number">4.9⭐</div><p class="text-gray-600 mt-1">Average rating</p></div>
        <div><div class="text-4xl md:text-5xl font-black text-orange-600 stat-number">12</div><p class="text-gray-600 mt-1">Literary awards</p></div>
      </div>
    </div>
  </section>

  <!-- ========== TIMELINE / OUR JOURNEY ========== -->
  <section class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 py-20">
    <div class="text-center mb-12">
      <span class="text-orange-500 font-semibold tracking-wide text-sm"><i class="fas fa-timeline mr-1"></i> The journey</span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2">How we became Paperbound</h2>
    </div>
    <div class="relative flex flex-col items-center">
      <!-- vertical line -->
      <div class="hidden md:block absolute left-1/2 w-0.5 h-full bg-orange-200 transform -translate-x-1/2"></div>
      <!-- timeline items -->
      <div class="grid md:grid-cols-1 gap-8 relative w-full max-w-3xl">
        <div class="relative flex flex-col md:flex-row md:items-center md:justify-between">
          <div class="md:w-5/12 text-right md:pr-8 order-2 md:order-1"><h3 class="text-xl font-bold text-gray-800">2022 · Humble Beginnings</h3><p class="text-gray-500 mt-1">Started as a tiny pop-up shop in Seattle, with 200 curated titles and a mission to celebrate indie authors.</p></div>
          <div class="absolute left-1/2 transform -translate-x-1/2 w-10 h-10 bg-orange-500 rounded-full border-4 border-white shadow-md timeline-dot hidden md:flex items-center justify-center"><i class="fas fa-seedling text-white text-sm"></i></div>
          <div class="md:w-5/12 order-1 md:order-2 md:pl-8 mb-4 md:mb-0"><div class="bg-orange-50 p-4 rounded-xl inline-block"><i class="fas fa-store text-orange-500 text-3xl"></i></div></div>
        </div>
        <div class="relative flex flex-col md:flex-row md:items-center md:justify-between mt-8">
          <div class="md:w-5/12 text-right md:pr-8 order-2 md:order-1"><h3 class="text-xl font-bold text-gray-800">2023 · Going Digital</h3><p class="text-gray-500 mt-1">Launched our online store, reaching readers nationwide. Introduced personalized book subscription boxes.</p></div>
          <div class="absolute left-1/2 transform -translate-x-1/2 w-10 h-10 bg-orange-500 rounded-full border-4 border-white shadow-md timeline-dot hidden md:flex items-center justify-center"><i class="fas fa-laptop text-white text-sm"></i></div>
          <div class="md:w-5/12 order-1 md:order-2 md:pl-8 mb-4 md:mb-0"><div class="bg-orange-50 p-4 rounded-xl inline-block"><i class="fas fa-rocket text-orange-500 text-3xl"></i></div></div>
        </div>
        <div class="relative flex flex-col md:flex-row md:items-center md:justify-between mt-8">
          <div class="md:w-5/12 text-right md:pr-8 order-2 md:order-1"><h3 class="text-xl font-bold text-gray-800">2024 · Community First</h3><p class="text-gray-500 mt-1">Launched monthly book clubs, author events, and a reading rewards program. 10k+ members strong.</p></div>
          <div class="absolute left-1/2 transform -translate-x-1/2 w-10 h-10 bg-orange-500 rounded-full border-4 border-white shadow-md timeline-dot hidden md:flex items-center justify-center"><i class="fas fa-users text-white text-sm"></i></div>
          <div class="md:w-5/12 order-1 md:order-2 md:pl-8 mb-4 md:mb-0"><div class="bg-orange-50 p-4 rounded-xl inline-block"><i class="fas fa-hand-peace text-orange-500 text-3xl"></i></div></div>
        </div>
        <div class="relative flex flex-col md:flex-row md:items-center md:justify-between mt-8">
          <div class="md:w-5/12 text-right md:pr-8 order-2 md:order-1"><h3 class="text-xl font-bold text-gray-800">2025 & Beyond · The Future</h3><p class="text-gray-500 mt-1">Expanding our indie press program, launching a podcast, and building the world's coziest reading app.</p></div>
          <div class="absolute left-1/2 transform -translate-x-1/2 w-10 h-10 bg-orange-500 rounded-full border-4 border-white shadow-md timeline-dot hidden md:flex items-center justify-center"><i class="fas fa-chart-line text-white text-sm"></i></div>
          <div class="md:w-5/12 order-1 md:order-2 md:pl-8 mb-4 md:mb-0"><div class="bg-orange-50 p-4 rounded-xl inline-block"><i class="fa-brands fa-d-and-d-beyond text-orange-500 text-3xl"></i></div></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== TEAM SECTION ========== -->
  <section class="bg-white/80 py-20 border-y border-orange-100">
    <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12">
      <div class="text-center mb-12">
        <span class="text-orange-500 font-semibold text-sm"><i class="fas fa-user-friends mr-1"></i> Meet the dreamers</span>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2">The faces behind Paperbound</h2>
        <p class="text-gray-500 max-w-2xl mx-auto mt-3">Bibliophiles, storytellers, and your reading companions.</p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Team member 1 -->
        <div class="team-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 text-center p-6">
          <div class="w-32 h-32 mx-auto bg-amber-100 rounded-full flex items-center justify-center text-5xl text-orange-600 mb-4"><i class="fas fa-user-astronaut"></i></div>
          <h3 class="text-xl font-bold text-gray-800">Sles Sakirin</h3>
          <p class="text-orange-500 text-sm font-medium">Founder & Head Curator</p>
          <p class="text-gray-500 text-sm mt-3 px-2">Former librarian with a passion for discovering hidden gems. Morgan believes every book deserves a reader.</p>
          <div class="flex justify-center space-x-3 mt-4 text-gray-500"><i class="fab fa-twitter hover:text-orange-500 cursor-pointer"></i><i class="fab fa-linkedin-in hover:text-orange-500 cursor-pointer"></i></div>
        </div>
        <!-- Team member 2 -->
        <div class="team-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 text-center p-6">
          <div class="w-32 h-32 mx-auto bg-amber-100 rounded-full flex items-center justify-center text-5xl text-orange-600 mb-4"><i class="fas fa-user-astronaut"></i></div>
          <h3 class="text-xl font-bold text-gray-800">Lon Tola</h3>
          <p class="text-orange-500 text-sm font-medium">Community Director</p>
          <p class="text-gray-500 text-sm mt-3 px-2">Organizes book clubs, author talks, and ensures every voice is heard. Jamal brings the magic of connection.</p>
          <div class="flex justify-center space-x-3 mt-4 text-gray-500"><i class="fab fa-twitter hover:text-orange-500 cursor-pointer"></i><i class="fab fa-instagram hover:text-orange-500 cursor-pointer"></i></div>
        </div>
        <!-- Team member 3 -->
        <div class="team-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 text-center p-6">
          <div class="w-32 h-32 mx-auto bg-amber-100 rounded-full flex items-center justify-center text-5xl text-orange-600 mb-4"><i class="fas fa-user-astronaut"></i></i></div>
          <h3 class="text-xl font-bold text-gray-800">Sern Chiminh</h3>
          <p class="text-orange-500 text-sm font-medium">Creative Director</p>
          <p class="text-gray-500 text-sm mt-3 px-2">Designs the cozy aesthetic and makes our store a visual haven. Elena is also a speculative fiction writer.</p>
          <div class="flex justify-center space-x-3 mt-4 text-gray-500"><i class="fab fa-dribbble hover:text-orange-500 cursor-pointer"></i><i class="fab fa-behance hover:text-orange-500 cursor-pointer"></i></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== VALUES / WHAT WE STAND FOR ========== -->
  <section class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 py-20">
    <div class="grid md:grid-cols-3 gap-8">
      <div class="bg-white rounded-2xl p-6 shadow-md text-center border border-orange-50">
        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-leaf text-orange-600 text-2xl"></i></div>
        <h3 class="text-xl font-bold text-gray-800">Sustainability</h3>
        <p class="text-gray-500 mt-2 text-sm">We use recycled packaging and partner with eco-conscious printers. Every order plants a tree.</p>
      </div>
      <div class="bg-white rounded-2xl p-6 shadow-md text-center border border-orange-50">
        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-hand-holding-heart text-orange-600 text-2xl"></i></div>
        <h3 class="text-xl font-bold text-gray-800">Inclusivity</h3>
        <p class="text-gray-500 mt-2 text-sm">We celebrate diverse authors and stories from all backgrounds. Our shelves reflect the world's richness.</p>
      </div>
      <div class="bg-white rounded-2xl p-6 shadow-md text-center border border-orange-50">
        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-chalkboard-user text-orange-600 text-2xl"></i></div>
        <h3 class="text-xl font-bold text-gray-800">Literacy Advocacy</h3>
        <p class="text-gray-500 mt-2 text-sm">5% of profits support local literacy programs and book donations to underserved schools.</p>
      </div>
    </div>
  </section>


@endsection
