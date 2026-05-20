<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('researches', function (Blueprint $table) {
            $table->string('uploaded_by')->nullable()->after('author');
        });
    }

    public function down()
    {
        Schema::table('researches', function (Blueprint $table) {
            $table->dropColumn('uploaded_by');
        });
    }
};