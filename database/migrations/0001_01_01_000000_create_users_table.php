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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('f_name', 45);
            $table->string('l_name', 45);
            $table->string('username', 45)->unique();
            $table->string('password', 255);
            $table->enum('role', ['user']);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->datetime('last_login')->nullable();
            $table->datetime('last_logout')->nullable();
            $table->timestamps(); 
        });

       
    }

   
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
