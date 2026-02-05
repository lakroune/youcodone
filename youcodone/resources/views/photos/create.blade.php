<x-app-layout>
    <form action="{{ route('photos.store') }} " method="POST">
        @csrf
        <div class="min-h-screen bg-[#050505] py-12 px-4">
            <div class="max-w-4xl mx-auto bg-[#0A0A0A] border border-white/5 p-6 md:p-10 rounded-[2.5rem] shadow-2xl">

                <div class="mb-8">
                    <h3 class="text-white text-2xl font-black italic uppercase">Galerie & Visuels<span
                            class="text-[#FF5F00]">.</span></h3>
                    <p class="text-gray-500 text-xs mt-2 uppercase tracking-widest font-bold">Optimisez l'aspect visuel
                        de votre établissement</p>
                    <button type="submit"
                        class="mt-4 bg-[#FF5F00] hover:bg-[#e65500] text-white text-[10px] font-black uppercase tracking-widest px-6 py-3 rounded-full shadow-lg transition-all">
                        Enregistrer les Photos

                    </button>
                </div>

                <div class="space-y-8">
                    <!-- Photo de Couverture (Principale) -->
                    <div class="space-y-3">
                        <label class="text-[10px] text-[#FF5F00] font-black uppercase tracking-[2px]">Photo de
                            Couverture
                            (Principale)</label>
                        <div class="relative h-64 w-full group">
                            <label
                                class="block w-full h-full border-2 border-dashed border-white/10 rounded-[2rem] cursor-pointer hover:border-[#FF5F00]/50 overflow-hidden bg-[#111] transition-all">
                                <input type="file" name="image_principale" class="hidden"
                                    onchange="previewImage(this)">
                                <img class="image-preview hidden w-full h-full object-cover">
                                <div class="preview-placeholder flex flex-col items-center justify-center h-full gap-3">
                                    <svg class="w-8 h-8 text-gray-700 group-hover:text-[#FF5F00] transition-colors"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.587-1.587a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-gray-600 text-[9px] font-black uppercase tracking-widest">Cliquez
                                        pour ajouter la photo principale</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <hr class="border-white/5">

                    <!-- Galerie d'ambiance -->
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <label class="text-[10px] text-gray-500 font-black uppercase tracking-[2px]">Photos
                                d'ambiance & Plats</label>
                            <button type="button" onclick="addImageInput()"
                                class="text-[8px] bg-white text-black px-4 py-2 rounded-full font-black uppercase tracking-widest hover:bg-[#FF5F00] hover:text-white transition-all shadow-lg">
                                + Ajouter un emplacement
                            </button>
                        </div>

                        <div id="images-container" class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <!-- Premier slot de galerie par défaut -->
                            <div class="relative h-32 group animate-fade-in">
                                <label
                                    class="block w-full h-full border-2 border-dashed border-white/10 rounded-2xl cursor-pointer hover:border-[#FF5F00]/50 overflow-hidden bg-[#111] transition-all">
                                    <input type="file" name="images[]" class="hidden" onchange="previewImage(this)">
                                    <img class="image-preview hidden w-full h-full object-cover">
                                    <div
                                        class="preview-placeholder flex items-center justify-center h-full text-gray-700 text-[18px] font-light">
                                        +</div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
    <script>
        /**
         * Gère la prévisualisation de l'image sélectionnée
         */
        function previewImage(input) {
            const container = input.closest('label');
            const preview = container.querySelector('.image-preview');
            const placeholder = container.querySelector('.preview-placeholder');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');

                    preview.animate([{
                            transform: 'scale(0.95)',
                            opacity: 0
                        },
                        {
                            transform: 'scale(1)',
                            opacity: 1
                        }
                    ], {
                        duration: 300,
                        easing: 'ease-out'
                    });
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        /**
         * Ajoute dynamiquement un nouveau slot d'image dans la galerie
         */
        function addImageInput() {
            const container = document.getElementById('images-container');

            const newSlot = document.createElement('div');
            newSlot.className = 'relative h-32 group opacity-0 translate-y-2 transition-all duration-300';

            newSlot.innerHTML = `
            <label class="block w-full h-full border-2 border-dashed border-white/10 rounded-2xl cursor-pointer hover:border-[#FF5F00]/50 overflow-hidden bg-[#111] transition-all">
                <input type="file" name="images[]" class="hidden" onchange="previewImage(this)">
                <img class="image-preview hidden w-full h-full object-cover">
                <div class="preview-placeholder flex items-center justify-center h-full text-gray-700 text-[18px] font-light">+</div>
            </label>
            <button type="button" onclick="removeSlot(this)" class="absolute -top-2 -right-2 bg-red-500 text-white w-6 h-6 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity shadow-xl hover:bg-red-600">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        `;

            container.appendChild(newSlot);

            setTimeout(() => {
                newSlot.classList.remove('opacity-0', 'translate-y-2');
            }, 10);
        }

        /**
         * Supprime un slot de la galerie
         */
        function removeSlot(button) {
            const slot = button.closest('.relative');
            slot.classList.add('opacity-0', 'scale-90');
            setTimeout(() => {
                slot.remove();
            }, 300);
        }
    </script>
</x-app-layout>
