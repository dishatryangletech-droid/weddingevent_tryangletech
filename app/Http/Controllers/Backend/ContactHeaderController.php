<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactPageHeader;
use App\Models\ContactPageCard;

class ContactHeaderController extends Controller
{
    public function index()
    {
        $header = ContactPageHeader::first();
        $cards = ContactPageCard::orderBy('sort_order', 'asc')->get();
        return view('backend.contact.header.index', compact('header', 'cards'));
    }

    public function updateHeader(Request $request)
    {
        $header = ContactPageHeader::first() ?? new ContactPageHeader();
        $header->tagline = $request->tagline;
        $header->title = $request->title;

        if ($request->hasFile('background_image')) {
            $fileName = time() . '_contact_bg.' . $request->background_image->extension();
            $request->background_image->move(public_path('uploads/contact'), $fileName);
            $header->background_image = 'uploads/contact/' . $fileName;
        }

        $header->save();

        return redirect()->back();
    }

    public function storeCard(Request $request)
    {
        $card = new ContactPageCard();
        $card->icon_type = $request->icon_type;
        $card->title = $request->title;
        $card->subtitle = $request->subtitle;
        $card->sort_order = ContactPageCard::max('sort_order') + 1;
        $card->save();

        return redirect()->back();
    }

    public function deleteCard($id)
    {
        ContactPageCard::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function reorderCards(Request $request)
    {
        $order = $request->input('order');
        if (is_array($order)) {
            foreach ($order as $index => $id) {
                ContactPageCard::where('id', $id)->update(['sort_order' => $index + 1]);
            }
        }
        return response()->json(['success' => true]);
    }
}
