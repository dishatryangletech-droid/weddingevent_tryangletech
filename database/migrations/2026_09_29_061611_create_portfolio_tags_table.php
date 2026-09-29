<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status')->default('active');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Seed default tags from the frontend
        DB::table('portfolio_tags')->insert([
            ['name' => 'All Celebrations', 'status' => 'active', 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Weddings',         'status' => 'active', 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Luxury Weddings',  'status' => 'active', 'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Destination',      'status' => 'active', 'sort_order' => 4, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_tags');
    }
};
