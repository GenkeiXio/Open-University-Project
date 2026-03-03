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
            $table->string('f_name', 45);
            $table->string('l_name', 45);
            $table->string('username', 45)->unique();
            $table->string('password', 255);
            $table->enum('role', ['super admin', 'admin', 'faculty']);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->json('permissions')->nullable();
            $table->datetime('last_login')->nullable();
            $table->datetime('last_logout')->nullable();
            $table->timestamps(); // This automatically adds created_at and updated_at
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
