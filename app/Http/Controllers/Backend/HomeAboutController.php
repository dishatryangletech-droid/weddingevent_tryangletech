<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAbout;
use Illuminate\Support\Facades\Storage;

class HomeAboutController extends Controller
{
    public function index()
    {
        $about = HomeAbout::first();
        return view('backend.home.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'tagline' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'service_1' => 'nullable|string|max:255',
            'service_2' => 'nullable|string|max:255',
            'service_3' => 'nullable|string|max:255',
            'stat_number' => 'nullable|integer',
            'stat_symbol' => 'nullable|string|max:10',
            'stat_text' => 'nullable|string|max:255',
            'image_left' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image_right' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $about = HomeAbout::first();
        if (!$about) {
            $about = new HomeAbout();
        }

        $about->tagline = $request->tagline;
        $about->title = $request->title;
        $about->description = $request->description;
        $about->service_1 = $request->service_1;
        $about->service_2 = $request->service_2;
        $about->service_3 = $request->service_3;
        $about->stat_number = $request->stat_number;
        $about->stat_symbol = $request->stat_symbol;
        $about->stat_text = $request->stat_text;

        if ($request->hasFile('image_left')) {
            $imageName = time() . '_left.' . $request->image_left->extension();
            $request->image_left->move(public_path('uploads/about'), $imageName);
            $about->image_left = 'uploads/about/' . $imageName;
        }

        if ($request->hasFile('image_right')) {
            $imageName = time() . '_right.' . $request->image_right->extension();
            $request->image_right->move(public_path('uploads/about'), $imageName);
            $about->image_right = 'uploads/about/' . $imageName;
        }

        $about->save();

        return redirect()->back()->with('success', 'Home About section updated successfully!');
    }
}
