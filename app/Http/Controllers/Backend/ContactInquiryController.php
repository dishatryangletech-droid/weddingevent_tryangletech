<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReplyMail;

class ContactInquiryController extends Controller
{
    public function index()
    {
        $inquiries = ContactInquiry::orderBy('created_at', 'desc')->paginate(15);
        return view('backend.contacts.index', compact('inquiries'));
    }

    public function show($id)
    {
        $inquiry = ContactInquiry::findOrFail($id);
        
        // Mark as read when viewed
        if (!$inquiry->is_read) {
            $inquiry->update(['is_read' => true]);
        }
        
        return view('backend.contacts.show', compact('inquiry'));
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply_message' => 'required|string',
        ]);

        $inquiry = ContactInquiry::findOrFail($id);
        $replyMessage = $request->input('reply_message');

        try {
            Mail::to($inquiry->email)->send(new ContactReplyMail($inquiry, $replyMessage));

            $inquiry->update([
                'replied_at' => now(),
                'reply_message' => $replyMessage,
            ]);

            return redirect()->route('admin.contacts.index')->with('success', 'Reply sent successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error sending reply: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $inquiry = ContactInquiry::findOrFail($id);
        $inquiry->delete();
        
        return redirect()->route('admin.contacts.index')->with('success', 'Inquiry deleted successfully.');
    }
}
