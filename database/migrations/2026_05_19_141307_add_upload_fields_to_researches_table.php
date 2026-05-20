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
        Schema::table('researches', function (Blueprint $table) {

            $table->string('degree')->nullable()->after('program_id');

            $table->string('document_type')->nullable()->after('degree');

            $table->longText('abstract')->nullable()->after('document_type');

            $table->date('published_date')->nullable()->after('abstract');

            $table->string('adviser')->nullable()->after('published_date');

            $table->string('chairperson')->nullable()->after('adviser');

            $table->json('panel_members')->nullable()->after('chairperson');

            $table->json('keywords')->nullable()->after('panel_members');

            $table->text('citation')->nullable()->after('keywords');

            $table->string('pdf_path')->nullable()->after('citation');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('researches', function (Blueprint $table) {

            $table->dropColumn([

                'degree',
                'document_type',
                'abstract',
                'published_date',
                'adviser',
                'chairperson',
                'panel_members',
                'keywords',
                'citation',
                'pdf_path',

            ]);

        });
    }
};