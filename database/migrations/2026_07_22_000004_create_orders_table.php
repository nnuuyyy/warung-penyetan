<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique();
            $table->string('customer_name');
            $table->string('phone_number');
            $table->string('order_type'); // dine_in, takeaway, delivery
            $table->string('table_or_address')->nullable();
            $table->text('notes')->nullable();
            $table->integer('total_price');
            $table->string('status')->default('whatsapp_sent');
            $table->json('items_json');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
