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
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->enum('type', ['appel_candidature', 'formation', 'stage', 'emploi', 'volontariat']);
            $table->date('deadline')->nullable();
            $table->enum('status', ['ouvert', 'cloture', 'resultats_publies'])->default('ouvert');
            $table->text('results_description')->nullable();
            $table->string('results_file')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opportunities');
    }
};
