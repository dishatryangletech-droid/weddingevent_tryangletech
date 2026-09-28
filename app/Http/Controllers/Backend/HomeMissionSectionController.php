<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeMissionSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class HomeMissionSectionController extends Controller
{
    public function index()
    {
        $setting = HomeMissionSection::getSettings();
        return view('backend.home.mission.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'tag' => 'nullable|string|max:255',
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'point_1_title' => 'nullable|string|max:255',
            'point_1_description' => 'nullable|string',
            'point_2_title' => 'nullable|string|max:255',
            'point_2_description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            $setting = HomeMissionSection::getSettings();
            $data = $request->except(['_token', 'image']);

            if ($request->hasFile('image')) {
                if ($setting->image && !str_starts_with($setting->image, 'http') && Storage::disk('public')->exists($setting->image)) {
                    Storage::disk('public')->delete($setting->image);
                }
                $data['image'] = $request->file('image')->store('home-mission', 'public');
            }

            $setting->update($data);

            return redirect()->back()->with('success', 'Home Mission Section updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating home mission section: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong! Please try again.');
        }
    }
}
