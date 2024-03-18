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
            $table->string('project_name');
            $table->string('city');
            $table->longText('descriptions');
            $table->string('developer');
            $table->string('maitre_ouvre');
            $table->string('typologie');
            $table->string('programme');
            $table->string('procedure');
            $table->string('signaletique');
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
