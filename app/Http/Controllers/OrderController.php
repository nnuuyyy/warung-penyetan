<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function submitWhatsApp(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:100',
            'phone_number' => 'required|string|max:20',
            'order_type' => 'required|string|in:dine_in,takeaway,delivery',
            'table_or_address' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:500',
            'total_price' => 'required|integer',
            'items' => 'required|array|min:1',
        ]);

        $orderCode = 'WMP-' . strtoupper(Str::random(6));

        // Save order history in database
        $order = Order::create([
            'order_code' => $orderCode,
            'customer_name' => $validated['customer_name'],
            'phone_number' => $validated['phone_number'],
            'order_type' => $validated['order_type'],
            'table_or_address' => $validated['table_or_address'] ?? '-',
            'notes' => $validated['notes'] ?? '-',
            'total_price' => $validated['total_price'],
            'status' => 'whatsapp_sent',
            'items_json' => $validated['items'],
        ]);

        $waPhone = env('WA_PHONE_NUMBER', '6285641225009');

        // Build WhatsApp Message
        $orderTypeLabel = match($validated['order_type']) {
            'dine_in' => 'Makan di Tempat (Dine-in)',
            'takeaway' => 'Bawa Pulang (Takeaway)',
            'delivery' => 'Kirim Ke Alamat (Delivery)',
            default => $validated['order_type']
        };

        $message = "Halo Mbak Puji, saya mau pesan makanan di *penyetan.mbakpuji* 🛵\n\n";
        $message .= "*Kode Pesanan:* #" . $orderCode . "\n";
        $message .= "*Nama:* " . $validated['customer_name'] . "\n";
        $message .= "*No. HP:* " . $validated['phone_number'] . "\n";
        $message .= "*Tipe Pesanan:* " . $orderTypeLabel . "\n";

        if ($validated['order_type'] === 'dine_in') {
            $message .= "*Nomor Meja:* " . ($validated['table_or_address'] ?: '-') . "\n";
        } else {
            $message .= "*Alamat Pengiriman:* " . ($validated['table_or_address'] ?: '-') . "\n";
        }

        $message .= "\n📋 *Rincian Pesanan:*\n";
        foreach ($validated['items'] as $index => $item) {
            $message .= ($index + 1) . ". *" . $item['name'] . "* x" . $item['qty'] . " = Rp " . number_format($item['price'] * $item['qty'], 0, ',', '.') . "\n";
        }

        if (!empty($validated['notes'])) {
            $message .= "\n📝 *Catatan Khusus:* " . $validated['notes'] . "\n";
        }

        $message .= "\n💰 *TOTAL BAYAR: Rp " . number_format($validated['total_price'], 0, ',', '.') . "*\n\n";
        $message .= "Mohon segera diproses ya Mbak Puji. Terima kasih! 🙏";

        $waUrl = "https://wa.me/" . $waPhone . "?text=" . urlencode($message);

        return response()->json([
            'success' => true,
            'order_code' => $orderCode,
            'redirect_url' => $waUrl,
        ]);
    }
}
