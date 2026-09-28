<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeRecognitionsSection;
use App\Models\HomeRecognitionItem;

class HomeRecognitionsController extends Controller
{
    public function index()
    {
        $section = HomeRecognitionsSection::first();
        $items = HomeRecognitionItem::orderBy('sort_order', 'asc')->get();
        return view('backend.home.recognitions.index', compact('section', 'items'));
    }

    public function updateSection(Request $request)
    {
        $section = HomeRecognitionsSection::first() ?? new HomeRecognitionsSection();
        $section->tagline = $request->tagline;
        $section->title = $request->title;

        if ($request->hasFile('video_poster')) {
            $fileName = time() . '_poster.' . $request->video_poster->extension();
            $request->video_poster->move(public_path('uploads/recognitions'), $fileName);
            $section->video_poster = 'uploads/recognitions/' . $fileName;
        }

        if ($request->hasFile('video_mp4')) {
            $fileName = time() . '_video.' . $request->video_mp4->extension();
            $request->video_mp4->move(public_path('uploads/recognitions'), $fileName);
            $section->video_mp4 = 'uploads/recognitions/' . $fileName;
        }

        if ($request->hasFile('video_webm')) {
            $fileName = time() . '_video.' . $request->video_webm->extension();
            $request->video_webm->move(public_path('uploads/recognitions'), $fileName);
            $section->video_webm = 'uploads/recognitions/' . $fileName;
        }

        $section->save();

        return redirect()->back();
    }

    public function storeItem(Request $request)
    {
        $item = new HomeRecognitionItem();
        $item->title = $request->title;
        $item->year = $request->year;
        $item->sort_order = HomeRecognitionItem::max('sort_order') + 1;
        $item->save();

        return redirect()->back();
    }

    public function deleteItem($id)
    {
        HomeRecognitionItem::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function reorderItems(Request $request)
    {
        $order = $request->input('order');
        if (is_array($order)) {
            foreach ($order as $index => $id) {
                HomeRecognitionItem::where('id', $id)->update(['sort_order' => $index + 1]);
            }
        }
        return response()->json(['success' => true]);
    }
}
