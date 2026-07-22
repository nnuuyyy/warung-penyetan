<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Warung Penyetan & Soto Mbak Puji - Nyoto, Maem, Ngopi')</title>
    
    <!-- Meta Description & SEO -->
    <meta name="description" content="Warung Penyetan & Soto Mbak Puji (@penyetan.mbakpuji) - tempat maemmu, makan di tempat, bungkus, delivery online food. Buka 17.00 - 01.00 WIB di Ngawen.">
    <meta name="keywords" content="penyetan mbak puji, warunk maem, soto mbak puji, penyetan ngawen, penyetan sambal bawang tomat">
    
    <!-- Google Fonts: Plus Jakarta Sans & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            400: '#3b82f6',
                            500: '#2563eb',
                            600: '#0052cc', // Signature Royal Blue Mbak Puji
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        },
                        chili: {
                            500: '#ef4444',
                            600: '#dc2626',
                            700: '#b91c1c',
                        },
                        darkwood: '#0f172a',
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        heading: ['"Outfit"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .bg-grid-pattern {
            background-image: radial-gradient(rgba(0, 82, 204, 0.15) 1px, transparent 1px);
            background-size: 24px 24px;
        }
        .glass-card {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(0, 82, 204, 0.2);
        }
        .text-gradient {
            background: linear-gradient(135deg, #60a5fa 0%, #0052cc 50%, #dc2626 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #0f172a;
        }
        ::-webkit-scrollbar-thumb {
            background: #0052cc;
            border-radius: 4px;
        }
    </style>
</head>
<body class="bg-darkwood text-gray-100 font-sans antialiased selection:bg-brand-600 selection:text-white min-h-screen flex flex-col justify-between overflow-x-hidden">

    <!-- Header Navbar -->
    @include('partials.navbar')

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Slide-over Cart Drawer -->
    @include('partials.cart-drawer')

    <!-- Item Detail Modal -->
    @include('partials.item-modal')

    <!-- Floating WhatsApp Cart Toggle Button -->
    <button id="floating-cart-btn" onclick="toggleCartDrawer()" class="fixed bottom-6 right-6 z-40 bg-gradient-to-r from-brand-600 to-blue-700 hover:from-brand-500 hover:to-blue-600 text-white font-bold py-3.5 px-6 rounded-full shadow-2xl shadow-blue-600/40 transition-all duration-300 transform hover:scale-105 flex items-center space-x-3 group border border-blue-400/30">
        <div class="relative">
            <i class="fa-solid fa-utensils text-lg"></i>
            <span id="cart-badge-count" class="absolute -top-3 -right-3 bg-red-600 text-white text-xs font-extrabold w-5 h-5 rounded-full flex items-center justify-center border-2 border-darkwood shadow animate-bounce">0</span>
        </div>
        <span class="hidden sm:inline text-sm font-heading tracking-wide">Pesanan Saya (<span id="cart-floating-total">Rp 0</span>)</span>
    </button>

    <!-- Notification Toast -->
    <div id="toast" class="fixed top-24 right-6 z-50 transform translate-x-full transition-transform duration-300 bg-emerald-600 text-white px-6 py-3.5 rounded-2xl shadow-2xl flex items-center space-x-3 border border-emerald-400/30">
        <i class="fa-solid fa-circle-check text-xl"></i>
        <span id="toast-message" class="text-xs font-bold">Pesanan berhasil ditambahkan!</span>
    </div>

    <!-- Cart & Global App Javascript logic -->
    <script>
        let cart = JSON.parse(localStorage.getItem('mbak_puji_cart')) || [];

        function updateCartUI() {
            const count = cart.reduce((acc, item) => acc + item.qty, 0);
            const total = cart.reduce((acc, item) => acc + (item.price * item.qty), 0);

            document.getElementById('cart-badge-count').innerText = count;
            const navBadge = document.getElementById('nav-cart-count');
            if (navBadge) navBadge.innerText = count;

            document.getElementById('cart-floating-total').innerText = 'Rp ' + total.toLocaleString('id-ID');
            document.getElementById('cart-subtotal').innerText = 'Rp ' + total.toLocaleString('id-ID');

            renderCartDrawerItems();
            localStorage.setItem('mbak_puji_cart', JSON.stringify(cart));
        }

        function addToCart(itemData) {
            const existingIndex = cart.findIndex(i => i.id === itemData.id);
            if (existingIndex > -1) {
                cart[existingIndex].qty += itemData.qty || 1;
            } else {
                cart.push({
                    id: itemData.id,
                    name: itemData.name,
                    price: parseInt(itemData.price),
                    qty: itemData.qty || 1,
                    image_url: itemData.image_url || ''
                });
            }
            updateCartUI();
            showToast(`"${itemData.name}" berhasil masuk keranjang!`);
        }

        function removeFromCart(index) {
            cart.splice(index, 1);
            updateCartUI();
        }

        function updateItemQty(index, delta) {
            cart[index].qty += delta;
            if (cart[index].qty <= 0) {
                cart.splice(index, 1);
            }
            updateCartUI();
        }

        function renderCartDrawerItems() {
            const container = document.getElementById('cart-items-container');
            const emptyNotice = document.getElementById('cart-empty-notice');
            const checkoutForm = document.getElementById('cart-checkout-form');

            if (cart.length === 0) {
                container.innerHTML = '';
                emptyNotice.classList.remove('hidden');
                checkoutForm.classList.add('hidden');
                return;
            }

            emptyNotice.classList.add('hidden');
            checkoutForm.classList.remove('hidden');

            container.innerHTML = cart.map((item, index) => `
                <div class="flex items-center justify-between p-3.5 bg-slate-900/90 rounded-2xl border border-blue-500/20 shadow-md">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 rounded-xl bg-cover bg-center flex-shrink-0 border border-slate-700" style="background-image: url('${item.image_url || 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c'}')"></div>
                        <div>
                            <h4 class="font-bold text-white text-xs leading-tight">${item.name}</h4>
                            <div class="text-blue-400 font-extrabold text-xs mt-0.5">Rp ${parseInt(item.price).toLocaleString('id-ID')}</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button onclick="updateItemQty(${index}, -1)" class="w-7 h-7 bg-slate-800 text-blue-400 rounded-lg hover:bg-blue-600 hover:text-white transition flex items-center justify-center font-bold text-xs">-</button>
                        <span class="text-white text-xs font-bold w-5 text-center">${item.qty}</span>
                        <button onclick="updateItemQty(${index}, 1)" class="w-7 h-7 bg-slate-800 text-blue-400 rounded-lg hover:bg-blue-600 hover:text-white transition flex items-center justify-center font-bold text-xs">+</button>
                        <button onclick="removeFromCart(${index})" class="text-gray-500 hover:text-red-400 transition ml-1 text-xs">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                </div>
            `).join('');
        }

        function toggleCartDrawer() {
            const drawer = document.getElementById('cart-drawer');
            const backdrop = document.getElementById('cart-backdrop');
            const panel = document.getElementById('cart-panel');

            if (drawer.classList.contains('hidden')) {
                drawer.classList.remove('hidden');
                setTimeout(() => {
                    backdrop.classList.remove('opacity-0');
                    panel.classList.remove('translate-x-full');
                }, 10);
            } else {
                backdrop.classList.add('opacity-0');
                panel.classList.add('translate-x-full');
                setTimeout(() => {
                    drawer.classList.add('hidden');
                }, 300);
            }
        }

        function showToast(msg) {
            const toast = document.getElementById('toast');
            document.getElementById('toast-message').innerText = msg;
            toast.classList.remove('translate-x-full');
            setTimeout(() => {
                toast.classList.add('translate-x-full');
            }, 3000);
        }

        function setOrderType(type) {
            document.getElementById('order_type').value = type;
            const btnDine = document.getElementById('btn-order-dinein');
            const btnTake = document.getElementById('btn-order-takeaway');
            const btnDeliv = document.getElementById('btn-order-delivery');
            const labelLoc = document.getElementById('label-table-or-address');

            [btnDine, btnTake, btnDeliv].forEach(btn => {
                btn.className = 'py-2 px-3 text-xs font-semibold rounded-xl bg-slate-900 text-gray-400 border border-slate-800 hover:border-blue-500 transition';
            });

            if (type === 'dine_in') {
                btnDine.className = 'py-2 px-3 text-xs font-semibold rounded-xl bg-blue-600 text-white border border-blue-500 shadow-md';
                labelLoc.innerText = 'Nomor Meja Anda';
            } else if (type === 'takeaway') {
                btnTake.className = 'py-2 px-3 text-xs font-semibold rounded-xl bg-blue-600 text-white border border-blue-500 shadow-md';
                labelLoc.innerText = 'Waktu Pengambilan';
            } else {
                btnDeliv.className = 'py-2 px-3 text-xs font-semibold rounded-xl bg-blue-600 text-white border border-blue-500 shadow-md';
                labelLoc.innerText = 'Alamat Lengkap Pengiriman';
            }
        }

        async function submitWhatsAppOrder(e) {
            e.preventDefault();
            if (cart.length === 0) return alert('Keranjang belanja Anda masih kosong!');

            const customer_name = document.getElementById('customer_name').value.trim();
            const phone_number = document.getElementById('phone_number').value.trim();
            const order_type = document.getElementById('order_type').value;
            const table_or_address = document.getElementById('table_or_address').value.trim();
            const notes = document.getElementById('order_notes').value.trim();

            if (!customer_name || !phone_number) {
                return alert('Silakan lengkapi nama dan nomor HP Anda.');
            }

            const total = cart.reduce((acc, item) => acc + (item.price * item.qty), 0);

            const payload = {
                customer_name,
                phone_number,
                order_type,
                table_or_address,
                notes,
                total_price: total,
                items: cart
            };

            const submitBtn = document.getElementById('btn-submit-wa');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner animate-spin"></i> Memproses Pesanan...';

            try {
                const res = await fetch('/api/checkout/whatsapp', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(payload)
                });
                const data = await res.json();
                if (data.success) {
                    cart = [];
                    updateCartUI();
                    window.open(data.redirect_url, '_blank');
                    toggleCartDrawer();
                } else {
                    alert('Gagal membuat pesanan.');
                }
            } catch (err) {
                console.error(err);
                alert('Terjadi kesalahan jaringan.');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fa-brands fa-whatsapp text-lg"></i> Kirim Pesanan via WhatsApp';
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            updateCartUI();
        });
    </script>
    @yield('scripts')
</body>
</html>
