<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('event_items', function (Blueprint $table) {
            $table->text('detail_headline')->nullable()->after('description');
            $table->text('detail_content')->nullable()->after('detail_headline');
            $table->string('detail_sub_image')->nullable()->after('detail_content');
            $table->text('detail_highlight_1')->nullable()->after('detail_sub_image');
            $table->text('detail_highlight_2')->nullable()->after('detail_highlight_1');
            $table->string('gallery_image_1')->nullable()->after('detail_highlight_2');
            $table->string('gallery_image_2')->nullable()->after('gallery_image_1');
            $table->string('gallery_image_3')->nullable()->after('gallery_image_2');
            $table->string('gallery_image_4')->nullable()->after('gallery_image_3');
        });

        // Set default gallery image fallbacks for existing event items
        DB::table('event_items')->update([
            'detail_sub_image' => 'images/6a6305bf5040b777232a184b_Event-data.avif',
            'gallery_image_1' => 'images/6a6305bf5040b777232a1703_Classic-gallery.avif',
            'gallery_image_2' => 'images/6a6305bf5040b777232a171d_Elegance-gallery.avif',
            'gallery_image_3' => 'images/6a6305bf5040b777232a17f7_Moment-large-image.avif',
            'gallery_image_4' => 'images/6a6305bf5040b777232a17f6_Moment-large-image.avif',
        ]);
    }

    public function down(): void
    {
        Schema::table('event_items', function (Blueprint $table) {
            $table->dropColumn([
                'detail_headline',
                'detail_content',
                'detail_sub_image',
                'detail_highlight_1',
                'detail_highlight_2',
                'gallery_image_1',
                'gallery_image_2',
                'gallery_image_3',
                'gallery_image_4',
            ]);
        });
    }
};
