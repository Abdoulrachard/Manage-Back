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
            $table->string('cover_path');
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

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipes');
    }
};