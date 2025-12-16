<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('puppies', function (Blueprint $table) {
            $table->text('catalog_short_description')->nullable()->after('short_description');
            $table->text('banner_description')->nullable()->after('catalog_short_description');
            $table->text('full_description')->nullable()->after('banner_description');
        });

        DB::statement('UPDATE puppies SET catalog_short_description = short_description WHERE catalog_short_description IS NULL');
        DB::statement('UPDATE puppies SET banner_description = description WHERE banner_description IS NULL');
        DB::statement('UPDATE puppies SET full_description = description WHERE full_description IS NULL');

        Schema::table('puppies', function (Blueprint $table) {
            $table->dropColumn('short_description');
            $table->dropColumn('description');
        });
    }

    public function down(): void
    {
        Schema::table('puppies', function (Blueprint $table) {
            $table->text('short_description')->nullable()->after('price');
            $table->text('description')->nullable()->after('short_description');
        });

        DB::statement('UPDATE puppies SET short_description = catalog_short_description WHERE short_description IS NULL');
        DB::statement('UPDATE puppies SET description = full_description WHERE description IS NULL');

        Schema::table('puppies', function (Blueprint $table) {
            $table->dropColumn('catalog_short_description');
            $table->dropColumn('banner_description');
            $table->dropColumn('full_description');
        });
    }
};
