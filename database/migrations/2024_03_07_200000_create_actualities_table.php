<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('actualities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cover_id')->constrained("galleries")->onDelete('CASCADE');
            $table->foreignId('category_id')->constrained();
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('actuality_gallery', function (Blueprint $table) {
            $table->id();
            $table->foreignId('actuality_id')->constrained()->onDelete('cascade');
            $table->foreignId('gallery_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actuality_gallery');
        Schema::dropIfExists('actualities');
    }
};