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
        Schema::create('usages', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Kullanıcı ilişkisi
            $table->string('key'); // Kullanım türü (ör: links, themes, clicks vs.)
            $table->unsignedInteger('used')->default(0); // Kullanılan miktar
            $table->unsignedInteger('limit')->nullable(); // Sınır varsa
            $table->timestamps();

            $table->unique(['user_id', 'key']); // Aynı kullanıcı için aynı key sadece 1 kez tanımlanır
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usages');
    }
};
