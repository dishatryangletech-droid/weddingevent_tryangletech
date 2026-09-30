<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeServiceSection;
use App\Models\HomeServiceCard;

class HomeServiceController extends Controller
{
    public function index()
    {
        $section = HomeServiceSection::first();
        $cards = HomeServiceCard::orderBy('sort_order', 'asc')->get();
        $masterServices = \App\Models\ServiceOfferItem::all();
        $addedTitles = $cards->pluck('title')->toArray();
        return view('backend.home.services.index', compact('section', 'cards', 'masterServices', 'addedTitles'));
    }

    public function updateSection(Request $request)
    {
        $section = HomeServiceSection::first() ?? new HomeServiceSection();
        $section->tagline = $request->tagline;
        $section->title = $request->title;
        $section->button_text = $request->button_text;
        $section->button_link = $request->button_link;
        $section->save();

        return redirect()->back();
    }

    public function storeCard(Request $request)
    {
        $request->validate([
            'service_master_id' => 'required|exists:service_offer_items,id',
        ]);

        $master = \App\Models\ServiceOfferItem::findOrFail($request->service_master_id);

        $card = new HomeServiceCard();
        $card->title = $master->title;
        $card->description = $master->description;
        
        if ($request->hasFile('image')) {
            $imageName = time() . '_service.' . $request->image->extension();
            $request->image->move(public_path('uploads/services'), $imageName);
            $card->image = 'uploads/services/' . $imageName;
        } else {
            $card->image = $master->image;
        }

        $card->sort_order = HomeServiceCard::max('sort_order') + 1;
        $card->save();

        return redirect()->back();
    }

    public function deleteCard($id)
    {
        HomeServiceCard::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function reorderCards(Request $request)
    {
        $order = $request->input('order');
        foreach ($order as $index => $id) {
            HomeServiceCard::where('id', $id)->update(['sort_order' => $index]);
        }
        return response()->json(['success' => true]);
    }
}
