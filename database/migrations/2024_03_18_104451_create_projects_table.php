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
            $table->string('cover_path');
            $table->string('year');
            $table->string('project_name');
            $table->string('city')->nullable();
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

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};