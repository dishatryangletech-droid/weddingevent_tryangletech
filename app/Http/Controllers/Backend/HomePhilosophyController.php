<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePhilosophySection;
use App\Models\HomePhilosophyItem;

class HomePhilosophyController extends Controller
{
    public function index()
    {
        $section = HomePhilosophySection::first();
        $items = HomePhilosophyItem::orderBy('sort_order', 'asc')->get();
        return view('backend.home.philosophy.index', compact('section', 'items'));
    }

    public function updateSection(Request $request)
    {
        $section = HomePhilosophySection::first() ?? new HomePhilosophySection();
        $section->tagline = $request->tagline;
        $section->title = $request->title;
        $section->review_stars = $request->review_stars;
        $section->review_text = $request->review_text;
        $section->review_author = $request->review_author;
        $section->review_author_subtitle = $request->review_author_subtitle;

        if ($request->hasFile('image')) {
            $imageName = time() . '_philosophy.' . $request->image->extension();
            $request->image->move(public_path('uploads/philosophy'), $imageName);
            $section->image = 'uploads/philosophy/' . $imageName;
        }
        
        if ($request->hasFile('review_author_image')) {
            $imageName = time() . '_author.' . $request->review_author_image->extension();
            $request->review_author_image->move(public_path('uploads/philosophy'), $imageName);
            $section->review_author_image = 'uploads/philosophy/' . $imageName;
        }

        $section->save();

        return redirect()->back();
    }

    public function storeItem(Request $request)
    {
        $item = new HomePhilosophyItem();
        $item->title = $request->title;
        $item->description = $request->description;
        $item->sort_order = HomePhilosophyItem::max('sort_order') + 1;
        $item->save();

        return redirect()->back();
    }

    public function deleteItem($id)
    {
        HomePhilosophyItem::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function reorderItems(Request $request)
    {
        $order = $request->input('order');
        foreach ($order as $index => $id) {
            HomePhilosophyItem::where('id', $id)->update(['sort_order' => $index]);
        }
        return response()->json(['success' => true]);
    }
}
