<?php

namespace App\Http\Controllers;

use App\Models\ContactEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEnquiryReply;

class ContactEnquiryController extends Controller
{
    public function index()
    {
        $enquiries = ContactEnquiry::latest()->paginate(10);
        return view('backend.contact-enquiries.index', compact('enquiries'));
    }

    public function show(ContactEnquiry $contactEnquiry)
    {
        return view('backend.contact-enquiries.show', compact('contactEnquiry'));
    }

    public function reply(Request $request, ContactEnquiry $contactEnquiry)
    {
        $request->validate([
            'reply_message' => 'required|string',
        ]);

        Mail::to($contactEnquiry->email)->send(new ContactEnquiryReply($contactEnquiry, $request->reply_message));

        $contactEnquiry->update([
            'is_replied' => true,
            'reply_message' => $request->reply_message,
        ]);

        return redirect()->route('admin.contact-enquiries.index')->with('success', 'Reply sent successfully.');
    }

    public function destroy(ContactEnquiry $contactEnquiry)
    {
        $contactEnquiry->delete();
        return redirect()->route('admin.contact-enquiries.index')->with('success', 'Enquiry deleted successfully.');
    }
}
