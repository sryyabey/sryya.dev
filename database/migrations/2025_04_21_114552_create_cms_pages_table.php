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
        Schema::create('cms_pages', function (Blueprint $table) {
            $table->id();
            $table->json('title'); // Sayfa başlığı
            $table->string('slug')->unique(); // Benzersiz URL parçası
            $table->json('content')->nullable(); // Sayfa içeriği
            $table->text('image')->nullable(); // Sayfa resmi
            $table->json('meta_title')->nullable(); // Meta başlık
            $table->json('meta_description')->nullable(); // Meta açıklama
            $table->json('meta_keywords')->nullable(); // Meta anahtar kelimeler
            $table->foreignId('category_id')->constrained('cms_categories')->onDelete('cascade'); // Kategori ID
            $table->json('tags')->nullable(); // Etiketler
            $table->boolean('is_published')->default(false); // Yayınlanma durumu
            $table->timestamp('published_at')->nullable(); // Yayınlanma tarihi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_pages');
    }
};
