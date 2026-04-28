<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pending_students', function (Blueprint $table) {
            $table->id('pending_student_id');
            $table->string('txt_fname', 45);
            $table->string('txt_lname', 45);
            $table->string('txt_email', 100)->unique();
            $table->string('txt_password');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pending_students');
    }
};