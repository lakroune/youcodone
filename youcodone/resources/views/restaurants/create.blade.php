<x-app-layout>
    <div class="min-h-screen bg-[#050505] py-12 px-4 md:px-0">
        <form action="{{ route('restaurants.store') }}" method="POST" class="max-w-2xl mx-auto space-y-8">
            @csrf

            <!-- SECTION 1 : LE PROPRIÉTAIRE -->
            <div class="bg-[#0A0A0A] border border-white/5 p-6 md:p-10 rounded-[2.5rem] shadow-2xl">
                <div class="mb-8">
                    <span class="text-[#FF5F00] text-[10px] font-black uppercase tracking-widest bg-[#FF5F00]/10 px-3 py-1 rounded-full">Étape 1/2</span>
                    <h3 class="text-white text-2xl font-black italic uppercase mt-4">Le Restaurateur<span class="text-[#FF5F00]">.</span></h3>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] text-gray-500 font-black uppercase tracking-[2px] ml-2">Nom Complet</label>
                        <input type="text" name="owner_name" required placeholder="Ex: Jean Dupont" 
                            class="w-full bg-[#111] border border-white/5 rounded-2xl px-5 py-4 text-white focus:border-[#FF5F00] focus:ring-1 focus:ring-[#FF5F00] outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] text-gray-500 font-black uppercase tracking-[2px] ml-2">Téléphone Direct</label>
                        <input type="text" name="owner_phone" required placeholder="06..." 
                            class="w-full bg-[#111] border border-white/5 rounded-2xl px-5 py-4 text-white focus:border-[#FF5F00] focus:ring-1 focus:ring-[#FF5F00] outline-none transition-all">
                    </div>
                </div>
            </div>

            <!-- SECTION 2 : LE RESTAURANT -->
            <div class="bg-[#0A0A0A] border border-white/5 p-6 md:p-10 rounded-[2.5rem] shadow-2xl">
                <div class="mb-8">
                    <span class="text-[#FF5F00] text-[10px] font-black uppercase tracking-widest bg-[#FF5F00]/10 px-3 py-1 rounded-full">Étape 2/2</span>
                    <h3 class="text-white text-2xl font-black italic uppercase mt-4">L'établissement<span class="text-[#FF5F00]">.</span></h3>
                </div>

                <div class="space-y-6">
                    <!-- Ligne 1 : Nom -->
                    <div class="space-y-2">
                        <label class="text-[10px] text-gray-500 font-black uppercase tracking-[2px] ml-2">Nom du Restaurant</label>
                        <input type="text" name="nom_restaurant" required 
                            class="w-full bg-[#111] border border-white/5 rounded-2xl px-5 py-4 text-white focus:border-[#FF5F00] outline-none">
                    </div>

                    <!-- Ligne 2 : Email & Téléphone (Grid 2 cols sur Desktop) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] text-gray-500 font-black uppercase tracking-[2px] ml-2">Email Restaurant</label>
                            <input type="email" name="email_restaurant" 
                                class="w-full bg-[#111] border border-white/5 rounded-2xl px-5 py-4 text-white focus:border-[#FF5F00] outline-none">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] text-gray-500 font-black uppercase tracking-[2px] ml-2">Téléphone Fixe</label>
                            <input type="text" name="telephone_restaurant" required 
                                class="w-full bg-[#111] border border-white/5 rounded-2xl px-5 py-4 text-white focus:border-[#FF5F00] outline-none">
                        </div>
                    </div>

                    <!-- Ligne 3 : Cuisine & Capacité -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] text-gray-500 font-black uppercase tracking-[2px] ml-2">Type de Cuisine</label>
                            <select name="type_cuisine_id" required 
                                class="w-full bg-[#111] border border-white/5 rounded-2xl px-5 py-4 text-white focus:border-[#FF5F00] outline-none appearance-none cursor-pointer">
                                <option value="" class="bg-[#0A0A0A]">Sélectionner...</option>
                                @foreach($type_cuisines as $type)
                                    <option value="{{ $type->id }}" class="bg-[#0A0A0A]">{{ $type->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] text-gray-500 font-black uppercase tracking-[2px] ml-2">Capacité (Couverts)</label>
                            <input type="number" name="capacite_restaurant" 
                                class="w-full bg-[#111] border border-white/5 rounded-2xl px-5 py-4 text-white focus:border-[#FF5F00] outline-none">
                        </div>
                    </div>

                    <!-- Ligne 4 : Adresse -->
                    <div class="space-y-2">
                        <label class="text-[10px] text-gray-500 font-black uppercase tracking-[2px] ml-2">Adresse Complète</label>
                        <input type="text" name="adresse_restaurant" required 
                            class="w-full bg-[#111] border border-white/5 rounded-2xl px-5 py-4 text-white focus:border-[#FF5F00] outline-none">
                    </div>

                    <!-- Ligne 5 : Description -->
                    <div class="space-y-2">
                        <label class="text-[10px] text-gray-500 font-black uppercase tracking-[2px] ml-2">Description / Histoire</label>
                        <textarea name="description_restaurant" rows="3" placeholder="Parlez-nous de votre concept..." 
                            class="w-full bg-[#111] border border-white/5 rounded-2xl px-5 py-4 text-white focus:border-[#FF5F00] outline-none resize-none"></textarea>
                    </div>
                </div>
            </div>

            <!-- Champs cachés et Bouton -->
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

            <button type="submit" class="group w-full bg-white text-black font-black py-6 rounded-[2rem] uppercase tracking-[3px] text-xs hover:bg-[#FF5F00] hover:text-white transition-all duration-300 shadow-xl flex items-center justify-center gap-3">
                Finaliser l'inscription 
                <span class="group-hover:translate-x-2 transition-transform">→</span>
            </button>
        </form>
    </div>
</x-app-layout>