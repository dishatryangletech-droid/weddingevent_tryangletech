<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactPageFaq;
use App\Models\ContactPageFaqItem;

class ContactFaqController extends Controller
{
    public function index()
    {
        $faqHeader = ContactPageFaq::first();
        $faqItems = ContactPageFaqItem::orderBy('sort_order', 'asc')->get();
        return view('backend.contact.faq.index', compact('faqHeader', 'faqItems'));
    }

    public function updateHeader(Request $request)
    {
        $header = ContactPageFaq::first() ?? new ContactPageFaq();
        $header->tagline = $request->tagline;
        $header->title = $request->title;
        $header->save();

        return redirect()->back();
    }

    public function storeItem(Request $request)
    {
        $item = new ContactPageFaqItem();
        $item->question = $request->question;
        $item->answer = $request->answer;
        $item->sort_order = ContactPageFaqItem::max('sort_order') + 1;
        $item->save();

        return redirect()->back();
    }

    public function deleteItem($id)
    {
        ContactPageFaqItem::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function reorderItems(Request $request)
    {
        $order = $request->input('order');
        if (is_array($order)) {
            foreach ($order as $index => $id) {
                ContactPageFaqItem::where('id', $id)->update(['sort_order' => $index + 1]);
            }
        }
        return response()->json(['success' => true]);
    }
}
