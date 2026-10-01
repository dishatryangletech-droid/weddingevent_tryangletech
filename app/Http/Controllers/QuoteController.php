<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;

class QuoteController extends Controller
{
    // Frontend form submission
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobileno' => 'nullable|string|max:20',
            'guests' => 'nullable|string|max:255',
            'package' => 'nullable|string|max:255',
            'venue' => 'nullable|string|max:255',
            'wedding_date' => 'nullable|date',
            'event_date' => 'nullable|date',
            'message' => 'nullable|string'
        ]);

        Quote::create($request->all());

        return redirect()->back()->with('success', 'Thank you! Your quote request has been received.');
    }

    // Admin index
    public function index()
    {
        $quotes = Quote::latest()->paginate(10);
        return view('backend.quotes.index', compact('quotes'));
    }

    // Admin edit
    public function edit(Quote $quote)
    {
        return view('backend.quotes.edit', compact('quote'));
    }

    // Admin update
    public function update(Request $request, Quote $quote)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobileno' => 'nullable|string|max:20',
            'guests' => 'nullable|string|max:255',
            'package' => 'nullable|string|max:255',
            'venue' => 'nullable|string|max:255',
            'wedding_date' => 'nullable|date',
            'event_date' => 'nullable|date',
            'message' => 'nullable|string',
            'status' => 'required|string'
        ]);

        $quote->update($request->all());

        return redirect()->route('admin.quotes.index')->with('success', 'Quote request updated successfully.');
    }

    // Admin approve
    public function approve(Quote $quote)
    {
        $quote->update(['status' => 'Approved']);
        return redirect()->back()->with('success', 'Quote request approved.');
    }

    // Admin reply
    public function reply(Request $request, Quote $quote)
    {
        $request->validate([
            'reply_message' => 'required|string',
        ]);

        // Logic to send email would go here
        // Mail::to($quote->email)->send(new QuoteReply($quote, $request->reply_message));

        $quote->update([
            'is_replied' => true,
            'reply_message' => $request->reply_message,
        ]);

        return redirect()->back()->with('success', 'Reply recorded successfully.');
    }

    // Admin destroy
    public function destroy(Quote $quote)
    {
        $quote->delete();
        return redirect()->route('admin.quotes.index')->with('success', 'Quote request deleted successfully.');
    }
}
