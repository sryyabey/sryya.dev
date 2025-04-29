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
        Schema::create('usage_limits', function (Blueprint $table) {
            $table->id();

            $table->foreignId('plan_id')->constrained()->onDelete('cascade'); // Plan ilişkisi
            $table->string('key'); // Kullanım türü (örn: links, themes, users)
            $table->unsignedInteger('limit')->nullable(); // Limit (null = sınırsız)
            $table->timestamps();

            $table->unique(['plan_id', 'key']); // Aynı plan için aynı key sadece bir kez tanımlanabilir
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usage_limits');
    }
};
