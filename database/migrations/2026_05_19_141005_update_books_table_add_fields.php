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
        Schema::table('books', function (Blueprint $table) {
            if (!Schema::hasColumn('books', 'title')) {
                $table->string('title')->after('id');
            }
            if (!Schema::hasColumn('books', 'author')) {
                $table->string('author')->after('title');
            }
            if (!Schema::hasColumn('books', 'price')) {
                $table->decimal('price', 10, 2)->after('author');
            }
            if (!Schema::hasColumn('books', 'description')) {
                $table->text('description')->after('price');
            }
            if (!Schema::hasColumn('books', 'cover_image')) {
                $table->string('cover_image')->nullable()->after('description');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn(['title', 'author', 'price', 'description', 'cover_image']);
        });
    }
};
