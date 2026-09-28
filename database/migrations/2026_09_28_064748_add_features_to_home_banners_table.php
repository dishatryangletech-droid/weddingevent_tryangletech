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
        Schema::table('home_banners', function (Blueprint $table) {
            for ($i = 1; $i <= 4; $i++) {
                $table->string("feature_{$i}_title")->nullable();
                $table->text("feature_{$i}_desc")->nullable();
                $table->string("feature_{$i}_icon")->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_banners', function (Blueprint $table) {
            for ($i = 1; $i <= 4; $i++) {
                $table->dropColumn([
                    "feature_{$i}_title",
                    "feature_{$i}_desc",
                    "feature_{$i}_icon"
                ]);
            }
        });
    }
};
