<nav x-data="{ open: false, userMenu: false }" class="bg-black border-b border-white/5 relative">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            
            <div class="flex items-center">
                <a href="/" class="group">
                    <span class="text-white text-xl font-black tracking-tighter italic uppercase group-hover:text-[#FF5F00] transition-colors">
                        YOUCO<span class="text-[#FF5F00] group-hover:text-white transition-colors">DONE.</span>
                    </span>
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-12">
                <a href="{{ route('dashboard') }}" class="text-[10px] font-black uppercase tracking-[3px] {{ request()->routeIs('dashboard') ? 'text-[#FF5F00]' : 'text-gray-500 hover:text-white' }} transition-all">
                    Tableau de bord
                </a>
                <a href="#" class="text-[10px] font-black uppercase tracking-[3px] text-gray-500 hover:text-white transition-all">Réservations</a>
                <a href="#" class="text-[10px] font-black uppercase tracking-[3px] text-gray-500 hover:text-white transition-all">Exploration</a>
            </div>

            <div class="hidden md:flex items-center gap-6">
                <div class="relative">
                    <button @click="userMenu = !userMenu" @click.away="userMenu = false" class="flex items-center gap-3 group outline-none">
                        <div class="text-right">
                            <p class="text-[10px] font-black uppercase tracking-widest text-white group-hover:text-[#FF5F00] transition-colors">{{ Auth::user()->username }}</p>
                            <p class="text-[8px] font-bold uppercase tracking-widest text-gray-600">Mon Compte</p>
                        </div>
                        <div class="w-10 h-10 rounded-full border border-white/10 p-1 group-hover:border-[#FF5F00] transition-all">
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->username }}&background=FF5F00&color=fff" class="w-full h-full rounded-full grayscale hover:grayscale-0 transition-all" alt="Avatar">
                        </div>
                    </button>

                    <div x-show="userMenu" x-transition class="absolute right-0 mt-4 w-48 bg-[#111] border border-white/5 rounded-xl shadow-2xl py-2 z-50">
                        <a href="{{ route('profile.edit') }}" class="block px-6 py-3 text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-[#FF5F00] hover:bg-white/5 transition-all">Profil Settings</a>
                        <div class="h-[1px] bg-white/5 my-2 mx-4"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-6 py-3 text-[10px] font-black uppercase tracking-widest text-red-500 hover:bg-red-500/10 transition-all">Déconnexion</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="text-white hover:text-[#FF5F00] transition-colors">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"/></svg>
                    <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open" x-transition class="md:hidden bg-black border-t border-white/5 px-6 py-10 space-y-8">
        <a href="{{ route('dashboard') }}" class="block text-2xl font-black italic uppercase tracking-tighter text-white">Dashboard</a>
        <a href="#" class="block text-2xl font-black italic uppercase tracking-tighter text-white">Réservations</a>
        <div class="h-[1px] bg-white/5 w-full"></div>
        <a href="{{ route('profile.edit') }}" class="block text-sm font-bold uppercase tracking-widest text-[#FF5F00]">Mon Profil</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block text-sm font-bold uppercase tracking-widest text-red-600">Log Out</button>
        </form>
    </div>
</nav> 