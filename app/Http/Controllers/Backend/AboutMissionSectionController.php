<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutMissionSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AboutMissionSectionController extends Controller
{
    public function index()
    {
        $setting = AboutMissionSection::getSettings();
        return view('backend.about.mission.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'tag' => 'nullable|string|max:255',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'quote_1_text' => 'nullable|string|max:255',
            'quote_2_text' => 'nullable|string|max:255',
            'quote_3_text' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            $setting = AboutMissionSection::getSettings();
            $data = $request->except(['_token', 'image']);

            if ($request->hasFile('image')) {
                if ($setting->image && !str_starts_with($setting->image, 'http') && Storage::disk('public')->exists($setting->image)) {
                    Storage::disk('public')->delete($setting->image);
                }
                $data['image'] = $request->file('image')->store('about-mission', 'public');
            }

            $setting->update($data);

            return redirect()->back()->with('success', 'About Us Mission Section updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating about mission section: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong! Please try again.');
        }
    }
}
