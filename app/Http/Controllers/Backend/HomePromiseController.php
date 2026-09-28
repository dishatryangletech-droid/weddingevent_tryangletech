<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePromise;

class HomePromiseController extends Controller
{
    public function index()
    {
        $promise = HomePromise::first();
        return view('backend.home.promise.index', compact('promise'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'tagline' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
        ]);

        $promise = HomePromise::first() ?? new HomePromise();

        $promise->tagline = $request->tagline;
        $promise->title = $request->title;

        for ($i = 1; $i <= 3; $i++) {
            $promise->{"card_{$i}_tagline"} = $request->input("card_{$i}_tagline");
            $promise->{"card_{$i}_title"} = $request->input("card_{$i}_title");
            $promise->{"card_{$i}_desc"} = $request->input("card_{$i}_desc");

            if ($request->hasFile("card_{$i}_image")) {
                $imageName = time() . "_card_{$i}." . $request->file("card_{$i}_image")->extension();
                $request->file("card_{$i}_image")->move(public_path('uploads/promise'), $imageName);
                $promise->{"card_{$i}_image"} = 'uploads/promise/' . $imageName;
            }
        }

        $promise->save();

        return redirect()->back()->with('success', 'Promise Section updated successfully!');
    }
}
