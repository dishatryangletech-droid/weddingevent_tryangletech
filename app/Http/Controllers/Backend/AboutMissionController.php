<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutPageMission;

class AboutMissionController extends Controller
{
    public function index()
    {
        $mission = AboutPageMission::first();
        return view('backend.about.mission.index', compact('mission'));
    }

    public function update(Request $request)
    {
        $mission = AboutPageMission::first() ?? new AboutPageMission();
        $mission->tagline = $request->tagline;
        $mission->title = $request->title;
        $mission->description = $request->description;
        $mission->button_text = $request->button_text;
        $mission->button_link = $request->button_link;

        if ($request->hasFile('video_poster')) {
            $fileName = time() . '_mission_poster.' . $request->video_poster->extension();
            $request->video_poster->move(public_path('uploads/about'), $fileName);
            $mission->video_poster = 'uploads/about/' . $fileName;
        }

        if ($request->hasFile('video_mp4')) {
            $fileName = time() . '_mission_mp4.' . $request->video_mp4->extension();
            $request->video_mp4->move(public_path('uploads/about'), $fileName);
            $mission->video_mp4 = 'uploads/about/' . $fileName;
        }

        if ($request->hasFile('video_webm')) {
            $fileName = time() . '_mission_webm.' . $request->video_webm->extension();
            $request->video_webm->move(public_path('uploads/about'), $fileName);
            $mission->video_webm = 'uploads/about/' . $fileName;
        }

        for ($i = 1; $i <= 4; $i++) {
            $mission->{"feature_{$i}_title"} = $request->input("feature_{$i}_title");
            
            if ($request->hasFile("feature_{$i}_image")) {
                $fileName = time() . "_mission_feat_{$i}." . $request->file("feature_{$i}_image")->extension();
                $request->file("feature_{$i}_image")->move(public_path('uploads/about'), $fileName);
                $mission->{"feature_{$i}_image"} = 'uploads/about/' . $fileName;
            }
        }

        $mission->save();

        return redirect()->back();
    }
}
