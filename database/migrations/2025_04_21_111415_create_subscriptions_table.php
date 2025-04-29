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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Kullanıcı ilişkisi
            $table->foreignId('plan_id')->constrained()->onDelete('cascade'); // Plan ilişkisi

            $table->date('starts_at'); // Başlangıç tarihi
            $table->date('ends_at');   // Bitiş tarihi
            $table->boolean('is_active')->default(true); // Aktiflik durumu

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
