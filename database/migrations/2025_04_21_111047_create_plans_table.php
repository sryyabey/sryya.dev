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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Plan adı (ör: "Basic", "Pro")
            $table->string('slug')->unique(); // URL-friendly isim
            $table->decimal('price', 8, 2); // Aylık fiyat
            $table->integer('duration_in_days')->default(30); // Plan süresi
            $table->text('description')->nullable(); // Plan açıklaması
            $table->json('features')->nullable(); // Özellikler JSON olarak saklanabilir
            $table->boolean('is_active')->default(true); // Yayında mı?
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
