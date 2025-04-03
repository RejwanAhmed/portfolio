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
            $table->string('short_description')->nullable()->after('password');
            $table->string('long_description')->nullable()->after('short_description');
            $table->string('phone')->nullable()->after('long_description');
            $table->string('address')->nullable()->after('phone');
            $table->string('linked_in_url')->nullable()->after('address');
            $table->string('github_url')->nullable()->after('linked_in_url');
            $table->string('landing_image_url')->nullable()->after('github_url');
            $table->string('about_me_image_url')->nullable()->after('landing_image_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('short_description');
            $table->dropColumn('long_description');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('linked_in_url');
            $table->dropColumn('github_url');
            $table->dropColumn('landing_image_url');
            $table->dropColumn('about_me_image_url');
        });
    }
};
