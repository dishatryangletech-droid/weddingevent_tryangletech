<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutPageStat;
use App\Models\AboutPageStatItem;

class AboutStatsController extends Controller
{
    public function index()
    {
        $statHeader = AboutPageStat::first();
        $statItems = AboutPageStatItem::orderBy('sort_order', 'asc')->get();
        return view('backend.about.stats.index', compact('statHeader', 'statItems'));
    }

    public function updateHeader(Request $request)
    {
        $header = AboutPageStat::first() ?? new AboutPageStat();

        if ($request->hasFile('background_image')) {
            $fileName = time() . '_stats_bg.' . $request->background_image->extension();
            $request->background_image->move(public_path('uploads/about'), $fileName);
            $header->background_image = 'uploads/about/' . $fileName;
        }

        $header->save();

        return redirect()->back();
    }

    public function storeItem(Request $request)
    {
        $item = new AboutPageStatItem();
        $item->item_number = $request->item_number;
        $item->number_title = $request->number_title;
        $item->description = $request->description;
        $item->sort_order = AboutPageStatItem::max('sort_order') + 1;
        $item->save();

        return redirect()->back();
    }

    public function deleteItem($id)
    {
        AboutPageStatItem::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function reorderItems(Request $request)
    {
        $order = $request->input('order');
        if (is_array($order)) {
            foreach ($order as $index => $id) {
                AboutPageStatItem::where('id', $id)->update(['sort_order' => $index + 1]);
            }
        }
        return response()->json(['success' => true]);
    }
}
