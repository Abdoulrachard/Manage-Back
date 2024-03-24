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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cover_id')->constrained("galleries")->onDelete('CASCADE');
            $table->string('year');
            $table->string('project_name');
            $table->string('city');
            $table->longText('descriptions');
            $table->string('developer');
            $table->string('maitre_ouvre');
            $table->string('typologie')->nullable();
            $table->text('programme')->nullable();
            $table->string('procedure')->nullable();
            $table->string('signaletique')->nullable();
            $table->string('surface')->nullable();
            $table->string('realisation')->nullable();
            $table->string('volume')->nullable();
            $table->timestamps();
        });

        Schema::create('project_gallery', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->foreignId('gallery_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_gallery');
        Schema::dropIfExists('projects');
    }
};