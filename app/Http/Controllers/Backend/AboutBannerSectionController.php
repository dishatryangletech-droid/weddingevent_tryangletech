<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutBannerSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutBannerSectionController extends Controller
{
    /**
     * Display the Banner Section management page for About Us.
     */
    public function index()
    {
        $settings = AboutBannerSection::getSettings();

        return view('backend.about.banner.index', compact('settings'));
    }

    /**
     * Update the Banner Section settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'string', 'max:500'],
            'banner_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,avif', 'max:5120'],
            'performance_title' => ['nullable', 'string', 'max:255'],
            'performance_percentage' => ['nullable', 'string', 'max:50'],
            'performance_description' => ['nullable', 'string', 'max:255'],
            'performance_badge' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:active,deactive'],
        ]);

        $settings = AboutBannerSection::getSettings();

        if ($request->hasFile('banner_image')) {
            if ($settings->banner_image && Storage::disk('public')->exists($settings->banner_image)) {
                Storage::disk('public')->delete($settings->banner_image);
            }
            $validated['banner_image'] = $request->file('banner_image')->store('about', 'public');
        }

        $settings->update($validated);

        return redirect()->route('admin.about.banner.index')
            ->with('success', 'About Us Banner Section updated successfully!');
    }
}
