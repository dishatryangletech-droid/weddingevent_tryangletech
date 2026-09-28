<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeAboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class HomeAboutSectionController extends Controller
{
    public function index()
    {
        $setting = HomeAboutSection::getSettings();
        return view('backend.home.about.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'tag' => 'nullable|string|max:255',
            'title' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'stat_1_number' => 'nullable|string|max:50',
            'stat_1_suffix' => 'nullable|string|max:50',
            'stat_1_label' => 'nullable|string|max:255',
            'stat_2_number' => 'nullable|string|max:50',
            'stat_2_suffix' => 'nullable|string|max:50',
            'stat_2_label' => 'nullable|string|max:255',
            'stat_3_number' => 'nullable|string|max:50',
            'stat_3_suffix' => 'nullable|string|max:50',
            'stat_3_label' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            $setting = HomeAboutSection::getSettings();
            $data = $request->except(['_token', 'image']);

            if ($request->hasFile('image')) {
                if ($setting->image && !str_starts_with($setting->image, 'http') && Storage::disk('public')->exists($setting->image)) {
                    Storage::disk('public')->delete($setting->image);
                }
                $data['image'] = $request->file('image')->store('home-about', 'public');
            }

            $setting->update($data);

            return redirect()->back()->with('success', 'Home About Us Section updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating home about section: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong! Please try again.');
        }
    }
}
