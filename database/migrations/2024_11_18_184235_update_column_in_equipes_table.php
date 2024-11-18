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
        Schema::table('equipes', function (Blueprint $table) {
            $table->longText('descriptions')->nullable()->change();
            $table->string('domaine_competence')->nullable()->change();
            $table->string('formations')->nullable()->change();
            $table->string('selections')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipes', function (Blueprint $table) {
            $table->longText('descriptions')->nullable(false)->change();
            $table->string('domaine_competence')->nullable(false)->change();
            $table->string('formations')->nullable()->change(false);
            $table->string('selections')->nullable()->change(false);
        });
    }
};
