<x-app-layout>

    <header class="max-w-7xl mx-auto px-6 pt-16 pb-10">
        <h2 class="text-4xl font-black tracking-tight mb-4 text-glow">RESTAURANTS<span class="text-[#FF5F00]">.</span>
        </h2>
        <p class="text-gray-500 text-sm max-w-md">Découvrez les meilleures tables sélectionnées pour vous. Réservez en un
            instant.</p>

        <div class="mt-8 max-w-lg relative">
            <input type="text" placeholder="Rechercher une cuisine, une ville..."
                class="w-full bg-[#151515] border border-white/5 rounded-xl px-5 py-4 text-sm outline-none focus:border-[#FF5F00] transition-all">
            <button class="absolute right-3 top-3 bg-[#FF5F00] p-2 rounded-lg text-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor font-bold">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

        @for ($i = 1; $i <= 6; $i++)
            <div class="restaurant-card rounded-2xl overflow-hidden group">
                <div class="relative h-56 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?q=80&w=800&auto=format&fit=crop"
                        alt="Restaurant"
                        class="w-full h-full object-cover group-hover:scale-110 transition-duration-500">
                    <div class="absolute top-4 left-4">
                        <span
                            class="orange-badge px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter">Italien</span>
                    </div>
                </div>

                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-lg font-bold">Le Petit Bistro</h3>
                        <div class="flex items-center text-[#FF5F00] text-xs">
                            <span class="font-bold">4.8</span>
                            <svg class="w-3 h-3 ml-1 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-500 text-xs mb-6 line-clamp-1">Casablanca, Maarif • 25-45 DTN</p>

                    <div class="flex items-center justify-between pt-4 border-t border-white/5">
                        <div class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">
                            8 Tables dispos
                        </div>
                        <a href="#"
                            class="bg-white text-black px-4 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-[#FF5F00] hover:text-white transition-all">
                            Réserver
                        </a>
                    </div>
                </div>
            </div>
        @endfor

    </main>
</x-app-layout>
