<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PortfolioBannerSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioBannerSectionController extends Controller
{
    public function index()
    {
        $banner = PortfolioBannerSection::firstOrCreate(
            ['id' => 1],
            [
                'title' => "Illuminating India's Heritage with Innovation",
                'button_text' => 'Get in Touch',
                'button_url' => '/contact',
                'stat_number' => '50+',
                'stat_title' => 'Iconic Landmark Projects',
                'stat_label_left' => 'Jan 2021',
                'stat_label_right' => 'Current',
            ]
        );

        return view('backend.portfolio-page.banner.index', compact('banner'));
    }

    public function update(Request $request)
    {
        $banner = PortfolioBannerSection::firstOrCreate(['id' => 1]);

        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,avif|max:2048',
            'stat_number' => 'nullable|string|max:255',
            'stat_title' => 'nullable|string|max:255',
            'stat_label_left' => 'nullable|string|max:255',
            'stat_label_right' => 'nullable|string|max:255',
            'status' => 'required|in:active,deactive',
        ]);

        if ($request->hasFile('banner_image')) {
            if ($banner->banner_image && ! str_starts_with($banner->banner_image, 'assets/')) {
                Storage::delete($banner->banner_image);
            }
            $validated['banner_image'] = $request->file('banner_image')->store('portfolio_banners', 'public');
        }

        $banner->update($validated);

        return redirect()->route('admin.portfolio-page.banner.index')->with('success', 'Banner section updated successfully.');
    }
}
