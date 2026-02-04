<x-app-layout>
    <div class="relative bg-black py-20 border-b border-white/5">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-black italic uppercase tracking-tighter text-white mb-8">
                FIND YOUR <span class="text-[#FF5F00]">VIBE.</span>
            </h1>

            <form action="{{ route('home') }}" method="POST" class="max-w-xl mx-auto">
                @csrf
                <div class="relative">
                    <input type="text" name="search" placeholder="Rechercher..."
                        class="w-full bg-[#111] border border-white/10 rounded-full text-white px-8 py-4 text-xs outline-none focus:border-[#FF5F00] transition-all uppercase tracking-widest"
                        value="{{ request('search') }}">
                    <div class="absolute right-6 top-4">
                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($restaurants as $restaurant)
                <a href="{{ route('restaurants.show', $restaurant->id) }}" class="group block">
                    <div
                        class="bg-[#0A0A0A] border border-white/5 rounded-2xl overflow-hidden transition-all duration-500 group-hover:border-[#FF5F00]/40">

                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ asset('storage/' . $restaurant->image) }}"
                                class="w-full h-full object-cover grayscale-[0.5] group-hover:grayscale-0 group-hover:scale-105 transition-all duration-700">

                            <div class="absolute top-4 left-4">
                                <span
                                    class="bg-black/60 backdrop-blur-md text-[#FF5F00] text-[8px] font-black uppercase tracking-widest px-2 py-1 rounded">
                                    {{ $restaurant->cuisine_type }}
                                </span>
                            </div>
                        </div>

                        <div class="p-5">
                            <h3
                                class="text-white text-sm font-black uppercase tracking-tight group-hover:text-[#FF5F00] transition-colors mb-1">
                                {{ $restaurant->name }}
                            </h3>

                            <div class="flex items-center gap-1.5 text-gray-500">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                                <span class="text-[9px] font-bold uppercase tracking-widest italic leading-none">
                                    {{ $restaurant->city }}
                                </span>
                            </div>
                        </div>

                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
