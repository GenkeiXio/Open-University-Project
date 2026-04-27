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
        Schema::create('admins', function (Blueprint $table) {
            $table->id('admin_id');
            $table->string('txt_fname', 45);
            $table->string('txt_minitial', 10)->nullable();
            $table->string('txt_lname', 45);
            $table->string('txt_extension', 10)->nullable();
            $table->string('txt_email', 100)->unique();
            $table->string('txt_password', 255);
            $table->enum('txt_role', ['admin', 'faculty', 'staff']);
            $table->enum('txt_status', ['active', 'inactive'])->default('active');
            $table->string('txt_position', 100)->nullable(); // NEW: Position field
            $table->json('txt_permissions')->nullable();
            $table->datetime('txt_lastlogin')->nullable();
            $table->datetime('txt_lastlogout')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
