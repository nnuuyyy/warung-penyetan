<!-- Cart Drawer Slide Over -->
<div id="cart-drawer" class="fixed inset-0 z-50 hidden overflow-hidden">
    <!-- Backdrop -->
    <div id="cart-backdrop" onclick="toggleCartDrawer()" class="absolute inset-0 bg-black/75 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <div class="fixed inset-y-0 right-0 max-w-full flex pl-10">
        <!-- Panel -->
        <div id="cart-panel" class="w-screen max-w-md bg-slate-950 border-l border-blue-500/30 shadow-2xl flex flex-col justify-between transform translate-x-full transition-transform duration-300">
            
            <!-- Header Cart -->
            <div class="p-5 bg-slate-900 border-b border-slate-800 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-xl bg-blue-600/20 border border-blue-500/30 flex items-center justify-center text-blue-400">
                        <i class="fa-solid fa-basket-shopping text-base"></i>
                    </div>
                    <div>
                        <h3 class="font-heading font-extrabold text-white text-base leading-tight">Keranjang Pesanan</h3>
                        <span class="text-xs text-blue-400 font-bold">penyetan.mbakpuji</span>
                    </div>
                </div>
                <button onclick="toggleCartDrawer()" class="w-8 h-8 rounded-lg bg-slate-800 text-gray-400 hover:text-white flex items-center justify-center hover:bg-slate-700 transition">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <!-- Content Area -->
            <div class="flex-1 overflow-y-auto p-5 space-y-4">
                <!-- Items list -->
                <div id="cart-items-container" class="space-y-3">
                    <!-- Populated dynamically via JS -->
                </div>

                <!-- Empty State -->
                <div id="cart-empty-notice" class="text-center py-16 space-y-4">
                    <div class="w-20 h-20 mx-auto rounded-full bg-slate-900 border border-blue-500/20 flex items-center justify-center text-blue-400/50">
                        <i class="fa-solid fa-utensils text-3xl"></i>
                    </div>
                    <div>
                        <h4 class="font-heading font-bold text-white text-lg">Keranjang Masih Kosong</h4>
                        <p class="text-xs text-gray-400 max-w-xs mx-auto mt-1">Pilih penyetan atau soto favorit Anda dan tambahkan ke pesanan.</p>
                    </div>
                    <a href="{{ route('menu.index') }}" onclick="toggleCartDrawer()" class="inline-block bg-blue-600 hover:bg-blue-500 text-white font-bold px-5 py-2.5 rounded-xl text-xs shadow transition">
                        Lihat Daftar Menu
                    </a>
                </div>

                <!-- Checkout Form -->
                <form id="cart-checkout-form" onsubmit="submitWhatsAppOrder(event)" class="hidden space-y-4 pt-4 border-t border-slate-800">
                    <h4 class="font-heading font-bold text-white text-xs flex items-center space-x-2 uppercase tracking-wider text-blue-400">
                        <i class="fa-solid fa-user-pen"></i>
                        <span>Informasi Pemesan</span>
                    </h4>

                    <!-- Order Type Selector -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-300 mb-1.5">Tipe Pesanan</label>
                        <input type="hidden" id="order_type" value="dine_in">
                        <div class="grid grid-cols-3 gap-2">
                            <button type="button" id="btn-order-dinein" onclick="setOrderType('dine_in')" class="py-2 px-3 text-xs font-semibold rounded-xl bg-blue-600 text-white border border-blue-500 shadow">
                                Makan di Tempat
                            </button>
                            <button type="button" id="btn-order-takeaway" onclick="setOrderType('takeaway')" class="py-2 px-3 text-xs font-semibold rounded-xl bg-slate-900 text-gray-400 border border-slate-800 hover:border-blue-500 transition">
                                Bawa Pulang
                            </button>
                            <button type="button" id="btn-order-delivery" onclick="setOrderType('delivery')" class="py-2 px-3 text-xs font-semibold rounded-xl bg-slate-900 text-gray-400 border border-slate-800 hover:border-blue-500 transition">
                                Delivery
                            </button>
                        </div>
                    </div>

                    <!-- Customer Name -->
                    <div>
                        <label for="customer_name" class="block text-xs font-semibold text-gray-300 mb-1">Nama Pemesan *</label>
                        <input type="text" id="customer_name" required placeholder="Nama Anda" class="w-full bg-slate-900 border border-slate-800 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition">
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <label for="phone_number" class="block text-xs font-semibold text-gray-300 mb-1">Nomor WhatsApp / HP *</label>
                        <input type="tel" id="phone_number" required placeholder="08123456789" class="w-full bg-slate-900 border border-slate-800 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition">
                    </div>

                    <!-- Table / Address -->
                    <div>
                        <label id="label-table-or-address" for="table_or_address" class="block text-xs font-semibold text-gray-300 mb-1">Nomor Meja Anda</label>
                        <input type="text" id="table_or_address" placeholder="Nomor Meja / Alamat lengkap" class="w-full bg-slate-900 border border-slate-800 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition">
                    </div>

                    <!-- Special Notes -->
                    <div>
                        <label for="order_notes" class="block text-xs font-semibold text-gray-300 mb-1">Catatan Pesanan (Opsional)</label>
                        <textarea id="order_notes" rows="2" placeholder="Misal: Sambal dipisah, soto tidak pakai tauge..." class="w-full bg-slate-900 border border-slate-800 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 transition"></textarea>
                    </div>

                    <!-- Submit WhatsApp Button -->
                    <button type="submit" id="btn-submit-wa" class="w-full bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-extrabold py-3.5 px-4 rounded-2xl shadow-lg shadow-emerald-900/40 transition duration-300 flex items-center justify-center space-x-2 text-xs mt-2">
                        <i class="fa-brands fa-whatsapp text-base"></i>
                        <span>Kirim Pesanan via WhatsApp</span>
                    </button>
                </form>
            </div>

            <!-- Footer Subtotal -->
            <div class="p-5 bg-slate-900 border-t border-slate-800">
                <div class="flex justify-between items-center mb-1.5">
                    <span class="text-xs text-gray-400">Total Pembayaran:</span>
                    <span id="cart-subtotal" class="font-heading font-black text-blue-400 text-lg">Rp 0</span>
                </div>
                <p class="text-[10px] text-gray-500 text-center">Diteruskan langsung ke WhatsApp Mbak Puji</p>
            </div>

        </div>
    </div>
</div>
