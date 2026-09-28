<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactPageForm;

class ContactFormController extends Controller
{
    public function index()
    {
        $formSettings = ContactPageForm::first();
        return view('backend.contact.form.index', compact('formSettings'));
    }

    public function update(Request $request)
    {
        $formSettings = ContactPageForm::first() ?? new ContactPageForm();
        $formSettings->title = $request->title;

        if ($request->hasFile('image')) {
            $fileName = time() . '_contact_form_img.' . $request->image->extension();
            $request->image->move(public_path('uploads/contact'), $fileName);
            $formSettings->image = 'uploads/contact/' . $fileName;
        }

        $formSettings->save();

        return redirect()->back();
    }
}
