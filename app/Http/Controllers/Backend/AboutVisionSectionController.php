<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutVisionSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AboutVisionSectionController extends Controller
{
    public function index()
    {
        $setting = AboutVisionSection::getSettings();
        return view('backend.about.vision.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'tag' => 'nullable|string|max:255',
            'title' => 'required|string',
            'check_1_text' => 'nullable|string|max:255',
            'check_2_text' => 'nullable|string|max:255',
            'check_3_text' => 'nullable|string|max:255',
            'check_4_text' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'right_title' => 'nullable|string|max:255',
            'right_description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            $setting = AboutVisionSection::getSettings();
            $data = $request->except(['_token', 'image']);

            if ($request->hasFile('image')) {
                if ($setting->image && !str_starts_with($setting->image, 'http') && Storage::disk('public')->exists($setting->image)) {
                    Storage::disk('public')->delete($setting->image);
                }
                $data['image'] = $request->file('image')->store('about-vision', 'public');
            }

            $setting->update($data);

            return redirect()->back()->with('success', 'About Us Vision Section updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating about vision section: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong! Please try again.');
        }
    }
}
