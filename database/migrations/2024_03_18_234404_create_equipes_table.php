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
        Schema::create('equipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cover_id')->constrained("galleries")->onDelete('CASCADE');
            $table->string('name');
            $table->string('posted');
            $table->longText('descriptions');
            $table->string('domaine_competence');
            $table->string('formations');
            $table->string('affilations')->nullable();
            $table->string('curiculum')->nullable();
            $table->string('links')->nullable();
            $table->string('selections');
            $table->timestamps();
        });

        Schema::create('equipe_gallery', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipe_id')->constrained()->onDelete('cascade');
            $table->foreignId('gallery_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipe_gallery');
        Schema::dropIfExists('equipes');
    }
};