<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('slug')->unique()->after('title');
            $table->text('excerpt')->nullable()->after('content');
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft')->after('excerpt');
            $table->timestamp('published_at')->nullable()->after('status');
            $table->string('image')->nullable()->after('published_at');
            $table->json('tags')->nullable()->after('image');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('excerpt');
            $table->dropColumn('status');
            $table->dropColumn('published_at');
            $table->dropColumn('image');
            $table->dropColumn('tags');
        });
    }
};
