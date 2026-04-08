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
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('txt_fname', 45);
            $table->string('txt_minitial', 10)->nullable();
            $table->string('txt_lname', 45);
            $table->string('txt_extension', 10)->nullable();
            $table->string('txt_email', 100)->unique();
            $table->timestamp('txt_email_verified_at')->nullable();
            $table->string('txt_password', 255);
            $table->datetime('txt_lastlogin')->nullable();
            $table->datetime('txt_lastlogout')->nullable();
            $table->timestamps();
        });

       
    }

   
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
