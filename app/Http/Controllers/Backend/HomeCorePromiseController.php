<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeCorePromise;

class HomeCorePromiseController extends Controller
{
    public function index()
    {
        $corePromise = HomeCorePromise::first();
        return view('backend.home.core_promise.index', compact('corePromise'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'tagline' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
        ]);

        $corePromise = HomeCorePromise::first() ?? new HomeCorePromise();

        $corePromise->tagline = $request->tagline;
        $corePromise->title = $request->title;
        $corePromise->button_text = $request->button_text;
        $corePromise->button_link = $request->button_link;

        for ($i = 1; $i <= 3; $i++) {
            $corePromise->{"item_{$i}_title"} = $request->input("item_{$i}_title");
            $corePromise->{"item_{$i}_desc"} = $request->input("item_{$i}_desc");
        }

        if ($request->hasFile("image")) {
            $imageName = time() . "_core_image." . $request->file("image")->extension();
            $request->file("image")->move(public_path('uploads/promise'), $imageName);
            $corePromise->image = 'uploads/promise/' . $imageName;
        }

        if ($request->hasFile('video_mp4')) {
            $videoName = time() . '_core_video.' . $request->video_mp4->extension();
            $request->video_mp4->move(public_path('uploads/promise'), $videoName);
            $corePromise->video_mp4 = 'uploads/promise/' . $videoName;
        }

        if ($request->hasFile('video_webm')) {
            $videoName = time() . '_core_video.' . $request->video_webm->extension();
            $request->video_webm->move(public_path('uploads/promise'), $videoName);
            $corePromise->video_webm = 'uploads/promise/' . $videoName;
        }

        $corePromise->save();

        return redirect()->back()->with('success', 'Core Promise Section updated successfully!');
    }
}
