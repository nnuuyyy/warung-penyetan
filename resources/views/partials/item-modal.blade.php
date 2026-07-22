<!-- Food Item Quick Detail Modal -->
<div id="item-modal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div id="item-modal-backdrop" onclick="closeItemModal()" class="fixed inset-0 bg-black/75 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <div class="flex items-center justify-center min-h-screen p-4">
        <div id="item-modal-panel" class="relative bg-slate-900 border border-blue-500/30 rounded-3xl max-w-lg w-full overflow-hidden shadow-2xl transform scale-95 opacity-0 transition-all duration-300">
            <!-- Close Button -->
            <button onclick="closeItemModal()" class="absolute top-4 right-4 z-10 w-9 h-9 rounded-full bg-black/60 text-white hover:bg-blue-600 transition flex items-center justify-center">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <!-- Image Cover -->
            <div id="modal-item-image" class="w-full h-64 bg-cover bg-center relative">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent"></div>
                <div class="absolute bottom-4 left-4 flex space-x-2">
                    <span id="modal-item-bestseller" class="bg-amber-500 text-black text-xs font-black px-2.5 py-1 rounded-full uppercase tracking-wider hidden">
                        ⭐ Best Seller
                    </span>
                    <span id="modal-item-category" class="bg-slate-950/80 text-blue-400 text-xs font-bold px-2.5 py-1 rounded-full border border-blue-500/30">
                        Penyetan
                    </span>
                </div>
            </div>

            <!-- Body Details -->
            <div class="p-6 space-y-4">
                <div class="flex justify-between items-start">
                    <h3 id="modal-item-name" class="font-heading font-extrabold text-2xl text-white">Ayam Penyet</h3>
                    <span id="modal-item-price" class="font-heading font-black text-xl text-blue-400">Rp 22.000</span>
                </div>

                <p id="modal-item-desc" class="text-xs text-gray-300 leading-relaxed">
                    Deskripsi lengkap menu khas Mbak Puji.
                </p>

                <!-- Quantity & Add to Cart -->
                <div class="flex items-center justify-between pt-4 border-t border-slate-800">
                    <div class="flex items-center space-x-3 bg-slate-950 p-1.5 rounded-xl border border-slate-800">
                        <button onclick="changeModalQty(-1)" class="w-8 h-8 rounded-lg bg-slate-800 text-white font-bold hover:bg-blue-600 transition">-</button>
                        <span id="modal-qty" class="text-white font-bold text-sm w-6 text-center">1</span>
                        <button onclick="changeModalQty(1)" class="w-8 h-8 rounded-lg bg-slate-800 text-white font-bold hover:bg-blue-600 transition">+</button>
                    </div>

                    <button id="modal-add-btn" onclick="addCurrentModalToCart()" class="flex-1 ml-4 bg-blue-600 hover:bg-blue-500 text-white font-extrabold py-3.5 px-6 rounded-2xl shadow-lg shadow-blue-600/30 transition text-xs flex items-center justify-center space-x-2">
                        <i class="fa-solid fa-plus"></i>
                        <span>Tambah ke Pesanan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let currentModalItem = null;
    let currentModalQty = 1;

    function openItemModal(itemId) {
        fetch(`/menu/item/${itemId}`)
            .then(res => res.json())
            .then(data => {
                currentModalItem = data;
                currentModalQty = 1;

                document.getElementById('modal-item-name').innerText = data.name;
                document.getElementById('modal-item-desc').innerText = data.description || 'Menu khas Mbak Puji.';
                document.getElementById('modal-item-price').innerText = data.formatted_price;
                document.getElementById('modal-item-category').innerText = data.category;
                document.getElementById('modal-item-image').style.backgroundImage = `url('${data.image_url}')`;

                const bsTag = document.getElementById('modal-item-bestseller');
                if (data.is_bestseller) {
                    bsTag.classList.remove('hidden');
                } else {
                    bsTag.classList.add('hidden');
                }

                document.getElementById('modal-qty').innerText = 1;

                const modal = document.getElementById('item-modal');
                const backdrop = document.getElementById('item-modal-backdrop');
                const panel = document.getElementById('item-modal-panel');

                modal.classList.remove('hidden');
                setTimeout(() => {
                    backdrop.classList.remove('opacity-0');
                    panel.classList.remove('scale-95', 'opacity-0');
                }, 10);
            });
    }

    function closeItemModal() {
        const modal = document.getElementById('item-modal');
        const backdrop = document.getElementById('item-modal-backdrop');
        const panel = document.getElementById('item-modal-panel');

        backdrop.classList.add('opacity-0');
        panel.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function changeModalQty(delta) {
        currentModalQty += delta;
        if (currentModalQty < 1) currentModalQty = 1;
        document.getElementById('modal-qty').innerText = currentModalQty;
    }

    function addCurrentModalToCart() {
        if (!currentModalItem) return;
        addToCart({
            id: currentModalItem.id,
            name: currentModalItem.name,
            price: currentModalItem.price,
            qty: currentModalQty,
            image_url: currentModalItem.image_url
        });
        closeItemModal();
    }
</script>
