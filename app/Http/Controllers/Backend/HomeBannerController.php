<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeBanner;
use Illuminate\Support\Facades\Storage;

class HomeBannerController extends Controller
{
    public function index()
    {
        $banner = HomeBanner::first();
        return view('backend.home.banner.index', compact('banner'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'video_poster' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'video_mp4' => 'nullable|mimes:mp4|max:10240',
            'video_webm' => 'nullable|mimes:webm|max:10240',
            'video_text' => 'nullable|string',
        ]);

        $banner = HomeBanner::first();
        if (!$banner) {
            $banner = new HomeBanner();
        }

        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->button_text = $request->button_text;
        $banner->button_link = $request->button_link;
        $banner->video_text = $request->video_text;

        if ($request->hasFile('background_image')) {
            $imageName = time() . '_bg.' . $request->background_image->extension();
            $request->background_image->move(public_path('uploads/banner'), $imageName);
            $banner->background_image = 'uploads/banner/' . $imageName;
        }

        if ($request->hasFile('video_poster')) {
            $imageName = time() . '_poster.' . $request->video_poster->extension();
            $request->video_poster->move(public_path('uploads/banner'), $imageName);
            $banner->video_poster = 'uploads/banner/' . $imageName;
        }

        if ($request->hasFile('video_mp4')) {
            $videoName = time() . '_video.' . $request->video_mp4->extension();
            $request->video_mp4->move(public_path('uploads/banner'), $videoName);
            $banner->video_mp4 = 'uploads/banner/' . $videoName;
        }

        if ($request->hasFile('video_webm')) {
            $videoName = time() . '_video.' . $request->video_webm->extension();
            $request->video_webm->move(public_path('uploads/banner'), $videoName);
            $banner->video_webm = 'uploads/banner/' . $videoName;
        }

        // Handle 4 Feature Cards
        for ($i = 1; $i <= 4; $i++) {
            $banner->{"feature_{$i}_title"} = $request->input("feature_{$i}_title");
            $banner->{"feature_{$i}_desc"} = $request->input("feature_{$i}_desc");
            
            if ($request->hasFile("feature_{$i}_icon")) {
                $iconName = time() . "_feature_{$i}_icon." . $request->file("feature_{$i}_icon")->extension();
                $request->file("feature_{$i}_icon")->move(public_path('uploads/banner'), $iconName);
                $banner->{"feature_{$i}_icon"} = 'uploads/banner/' . $iconName;
            }
        }

        $banner->save();

        return redirect()->back();
    }
}
