<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeTeamSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class HomeTeamSectionController extends Controller
{
    public function index()
    {
        $setting = HomeTeamSection::getSettings();
        return view('backend.home.team.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'tag' => 'nullable|string|max:255',
            'title' => 'required|string',
            'person_1_name' => 'required|string|max:255',
            'person_1_role' => 'nullable|string|max:255',
            'person_1_image' => 'nullable|image|max:2048',
            'person_2_name' => 'required|string|max:255',
            'person_2_role' => 'nullable|string|max:255',
            'person_2_image' => 'nullable|image|max:2048',
            'video_file' => 'nullable|mimes:mp4,webm|max:51200',
            'video_url' => 'nullable|string',
            'video_poster' => 'nullable|image|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            $setting = HomeTeamSection::getSettings();
            $data = $request->except(['_token', 'person_1_image', 'person_2_image', 'video_poster', 'video_file']);

            if ($request->hasFile('person_1_image')) {
                if ($setting->person_1_image && !str_starts_with($setting->person_1_image, 'http') && Storage::disk('public')->exists($setting->person_1_image)) {
                    Storage::disk('public')->delete($setting->person_1_image);
                }
                $data['person_1_image'] = $request->file('person_1_image')->store('home-team', 'public');
            }

            if ($request->hasFile('person_2_image')) {
                if ($setting->person_2_image && !str_starts_with($setting->person_2_image, 'http') && Storage::disk('public')->exists($setting->person_2_image)) {
                    Storage::disk('public')->delete($setting->person_2_image);
                }
                $data['person_2_image'] = $request->file('person_2_image')->store('home-team', 'public');
            }

            if ($request->hasFile('video_poster')) {
                if ($setting->video_poster && !str_starts_with($setting->video_poster, 'http') && Storage::disk('public')->exists($setting->video_poster)) {
                    Storage::disk('public')->delete($setting->video_poster);
                }
                $data['video_poster'] = $request->file('video_poster')->store('home-team', 'public');
            }

            if ($request->hasFile('video_file')) {
                // If there's an existing video that was uploaded locally, delete it
                if ($setting->video_url && !str_starts_with($setting->video_url, 'http') && Storage::disk('public')->exists($setting->video_url)) {
                    Storage::disk('public')->delete($setting->video_url);
                }
                $data['video_url'] = $request->file('video_file')->store('home-team/videos', 'public');
            }

            $setting->update($data);

            return redirect()->back()->with('success', 'Home Team Section updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating home team section: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong! Please try again.');
        }
    }
}
