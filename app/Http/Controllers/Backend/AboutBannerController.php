<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutPageBanner;

class AboutBannerController extends Controller
{
    public function index()
    {
        $banner = AboutPageBanner::first();
        return view('backend.about.banner.index', compact('banner'));
    }

    public function update(Request $request)
    {
        $banner = AboutPageBanner::first() ?? new AboutPageBanner();
        $banner->tagline = $request->tagline;
        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->button_text = $request->button_text;
        $banner->button_link = $request->button_link;
        
        $banner->tag_1 = $request->tag_1;
        $banner->tag_2 = $request->tag_2;
        $banner->tag_3 = $request->tag_3;
        $banner->tag_4 = $request->tag_4;
        $banner->tag_5 = $request->tag_5;
        
        // Also sync tags string
        $banner->tags = implode(', ', array_filter([
            $request->tag_1,
            $request->tag_2,
            $request->tag_3,
            $request->tag_4,
            $request->tag_5,
        ]));

        $banner->card_text = $request->card_text;

        if ($request->hasFile('background_image')) {
            $fileName = time() . '_about_bg.' . $request->background_image->extension();
            $request->background_image->move(public_path('uploads/about'), $fileName);
            $banner->background_image = 'uploads/about/' . $fileName;
        }

        if ($request->hasFile('card_image')) {
            $fileName = time() . '_about_card.' . $request->card_image->extension();
            $request->card_image->move(public_path('uploads/about'), $fileName);
            $banner->card_image = 'uploads/about/' . $fileName;
        }

        $banner->save();

        return redirect()->back();
    }
}
