<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('invoice_id')->constrained()->onDelete('cascade'); // Hangi faturaya ait
            $table->decimal('amount', 10, 2); // Ödeme tutarı
            $table->string('payment_method')->nullable(); // Kart, havale vs.
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending'); // Ödeme durumu
            $table->timestamp('paid_at')->nullable(); // Ödeme tarihi

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
