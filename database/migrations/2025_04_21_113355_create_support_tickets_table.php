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
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Talep sahibi kullanıcı
            $table->string('subject');           // Konu başlığı
            $table->text('message');             // Talep içeriği
            $table->enum('status', ['open', 'pending', 'resolved', 'closed'])->default('open'); // Durumu
            $table->timestamp('resolved_at')->nullable(); // Çözülme zamanı
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};
