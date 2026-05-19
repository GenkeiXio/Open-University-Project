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
        Schema::create('researches', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('author');
        $table->enum('level', ['masters', 'doctorate']);
        $table->enum('status', ['completed', 'ongoing']);
        $table->foreignId('program_id')->constrained()->cascadeOnDelete();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research');
    }
};
