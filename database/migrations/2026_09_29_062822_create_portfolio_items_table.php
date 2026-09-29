<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portfolio_tag_id')->nullable();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('client_name')->nullable();
            $table->string('date_text')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            
            $table->string('detail_headline')->nullable();
            $table->longText('detail_content')->nullable();
            $table->string('detail_sub_image')->nullable();
            $table->string('detail_highlight_1')->nullable();
            $table->string('detail_highlight_2')->nullable();

            $table->string('gallery_tag')->nullable();
            $table->string('gallery_title')->nullable();
            $table->string('gallery_image_1')->nullable();
            $table->string('gallery_image_2')->nullable();
            $table->string('gallery_image_3')->nullable();
            $table->string('gallery_image_4')->nullable();

            $table->integer('sort_order')->default(0);
            $table->string('status')->default('active');
            $table->timestamps();

            $table->foreign('portfolio_tag_id')->references('id')->on('portfolio_tags')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_items');
    }
};
