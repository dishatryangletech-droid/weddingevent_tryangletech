<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutPageExpertise;
use App\Models\AboutPageExpertiseItem;

class AboutExpertiseController extends Controller
{
    public function index()
    {
        $expertiseHeader = AboutPageExpertise::first();
        $expertiseItems = AboutPageExpertiseItem::orderBy('sort_order', 'asc')->get();
        return view('backend.about.expertise.index', compact('expertiseHeader', 'expertiseItems'));
    }

    public function updateHeader(Request $request)
    {
        $header = AboutPageExpertise::first() ?? new AboutPageExpertise();
        $header->tagline = $request->tagline;
        $header->title = $request->title;

        if ($request->hasFile('left_image')) {
            $fileName = time() . '_about_exp_left.' . $request->left_image->extension();
            $request->left_image->move(public_path('uploads/about'), $fileName);
            $header->left_image = 'uploads/about/' . $fileName;
        }

        $header->save();

        return redirect()->back();
    }

    public function storeItem(Request $request)
    {
        $item = new AboutPageExpertiseItem();
        $item->title = $request->title;
        $item->description = $request->description;
        $item->sort_order = AboutPageExpertiseItem::max('sort_order') + 1;

        if ($request->hasFile('image')) {
            $fileName = time() . '_about_exp_item.' . $request->image->extension();
            $request->image->move(public_path('uploads/about'), $fileName);
            $item->image = 'uploads/about/' . $fileName;
        }

        $item->save();

        return redirect()->back();
    }

    public function deleteItem($id)
    {
        AboutPageExpertiseItem::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function reorderItems(Request $request)
    {
        $order = $request->input('order');
        if (is_array($order)) {
            foreach ($order as $index => $id) {
                AboutPageExpertiseItem::where('id', $id)->update(['sort_order' => $index + 1]);
            }
        }
        return response()->json(['success' => true]);
    }
}
