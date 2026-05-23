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
        <div><div class="text-4xl md:text-5xl font-black text-orange-600 stat-number">{{ $companyInfo['happy_readers'] ?? '20k+' }}</div><p class="text-gray-600 mt-1">Happy readers</p></div>
        <div><div class="text-4xl md:text-5xl font-black text-orange-600 stat-number">{{ $companyInfo['publishers'] ?? '350+' }}</div><p class="text-gray-600 mt-1">Independent publishers</p></div>
        <div><div class="text-4xl md:text-5xl font-black text-orange-600 stat-number">{{ $companyInfo['rating'] ?? '4.9' }}⭐</div><p class="text-gray-600 mt-1">Average rating</p></div>
        <div><div class="text-4xl md:text-5xl font-black text-orange-600 stat-number">{{ $companyInfo['awards'] ?? '12' }}</div><p class="text-gray-600 mt-1">Literary awards</p></div>
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
        @forelse($timelineEvents as $event)
        <div class="relative flex flex-col md:flex-row md:items-center md:justify-between">
          <div class="md:w-5/12 text-right md:pr-8 order-2 md:order-1"><h3 class="text-xl font-bold text-gray-800">{{ $event->year }} · {{ $event->title }}</h3><p class="text-gray-500 mt-1">{{ $event->description }}</p></div>
          <div class="absolute left-1/2 transform -translate-x-1/2 w-10 h-10 bg-orange-500 rounded-full border-4 border-white shadow-md timeline-dot hidden md:flex items-center justify-center"><i class="fas {{ $event->icon }} text-white text-sm"></i></div>
          <div class="md:w-5/12 order-1 md:order-2 md:pl-8 mb-4 md:mb-0"><div class="bg-orange-50 p-4 rounded-xl inline-block"><i class="fas {{ $event->icon }} text-orange-500 text-3xl"></i></div></div>
        </div>
        @if(!$loop->last)
        <div style="margin-top: 2rem;"></div>
        @endif
        @empty
        <p class="text-gray-500 text-center">No timeline events available</p>
        @endforelse
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
        @forelse($teamMembers as $member)
        <div class="team-card bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 text-center p-6">
          @if($member->image)
            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="w-32 h-32 mx-auto rounded-full object-cover mb-4">
          @else
            <div class="w-32 h-32 mx-auto bg-amber-100 rounded-full flex items-center justify-center text-5xl text-orange-600 mb-4"><i class="fas fa-user-astronaut"></i></div>
          @endif
          <h3 class="text-xl font-bold text-gray-800">{{ $member->name }}</h3>
          <p class="text-orange-500 text-sm font-medium">{{ $member->position }}</p>
          <p class="text-gray-500 text-sm mt-3 px-2">{{ $member->description }}</p>
          <div class="flex justify-center space-x-3 mt-4 text-gray-500">
            @if($member->social_links)
              @php $socials = json_decode($member->social_links, true); @endphp
              @if(isset($socials['twitter']))<a href="{{ $socials['twitter'] }}" class="hover:text-orange-500 cursor-pointer"><i class="fab fa-twitter"></i></a>@endif
              @if(isset($socials['linkedin']))<a href="{{ $socials['linkedin'] }}" class="hover:text-orange-500 cursor-pointer"><i class="fab fa-linkedin-in"></i></a>@endif
              @if(isset($socials['instagram']))<a href="{{ $socials['instagram'] }}" class="hover:text-orange-500 cursor-pointer"><i class="fab fa-instagram"></i></a>@endif
              @if(isset($socials['dribbble']))<a href="{{ $socials['dribbble'] }}" class="hover:text-orange-500 cursor-pointer"><i class="fab fa-dribbble"></i></a>@endif
            @endif
          </div>
        </div>
        @empty
        <p class="text-gray-500 text-center">No team members available</p>
        @endforelse
      </div>
    </div>
  </section>
@endsection
