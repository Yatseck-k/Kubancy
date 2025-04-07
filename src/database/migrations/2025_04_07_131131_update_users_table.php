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
        Schema::table('users', function (Blueprint $table) {
            $table->year('birth_year');
            $table->string('avatar')->nullable()->after('birth_year');
            $table->text('bio')->nullable()->after('avatar');
            $table->timestamp('last_login')->nullable()->after('bio');
            $table->enum('status', ['active', 'blocked'])->default('active')->after('last_login');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nickname');
            $table->dropColumn('birth_year');
            $table->dropColumn('avatar');
            $table->dropColumn('bio');
            $table->dropColumn('last_login');
            $table->dropColumn('status');
        });
    }
};
