<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogBannerSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogBannerSectionController extends Controller
{
    public function index()
    {
        $banner = BlogBannerSection::firstOrCreate(
            ['id' => 1],
            [
                'title' => 'Expert insights for modern brands worldwide',
                'subtitle' => 'Marketing insights that inspire growth',
            ]
        );

        return view('backend.blog-page.banner.index', compact('banner'));
    }

    public function update(Request $request)
    {
        $banner = BlogBannerSection::firstOrCreate(['id' => 1]);

        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,avif|max:2048',
            'status' => 'required|in:active,deactive',
        ]);

        if ($request->hasFile('banner_image')) {
            if ($banner->banner_image && ! str_starts_with($banner->banner_image, 'assets/')) {
                Storage::delete($banner->banner_image);
            }
            $validated['banner_image'] = $request->file('banner_image')->store('blog_banners', 'public');
        }

        $banner->update($validated);

        return redirect()->route('admin.blog-page.banner.index')->with('success', 'Banner section updated successfully.');
    }
}
