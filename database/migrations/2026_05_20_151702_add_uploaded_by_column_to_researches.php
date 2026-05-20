<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('researches', 'uploaded_by')) {
            Schema::table('researches', function (Blueprint $table) {
                $table->string('uploaded_by')->nullable()->after('author');
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('researches', 'uploaded_by')) {
            Schema::table('researches', function (Blueprint $table) {
                $table->dropColumn('uploaded_by');
            });
        }
    }
};