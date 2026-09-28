<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutPageStory;

class AboutStoryController extends Controller
{
    public function index()
    {
        $story = AboutPageStory::first();
        return view('backend.about.story.index', compact('story'));
    }

    public function update(Request $request)
    {
        $story = AboutPageStory::first() ?? new AboutPageStory();
        $story->title = $request->title;
        $story->description = $request->description;

        $story->feature_1_title = $request->feature_1_title;
        $story->feature_1_desc = $request->feature_1_desc;
        $story->feature_1_button_text = $request->feature_1_button_text;
        $story->feature_1_button_link = $request->feature_1_button_link;

        $story->feature_2_title = $request->feature_2_title;
        $story->feature_2_desc = $request->feature_2_desc;
        $story->feature_2_button_text = $request->feature_2_button_text;
        $story->feature_2_button_link = $request->feature_2_button_link;

        $story->right_card_title = $request->right_card_title;
        $story->right_card_subtitle = $request->right_card_subtitle;
        $story->right_card_bottom_text = $request->right_card_bottom_text;

        if ($request->hasFile('left_main_image')) {
            $fileName = time() . '_story_left.' . $request->left_main_image->extension();
            $request->left_main_image->move(public_path('uploads/about'), $fileName);
            $story->left_main_image = 'uploads/about/' . $fileName;
        }

        if ($request->hasFile('right_card_image')) {
            $fileName = time() . '_story_right.' . $request->right_card_image->extension();
            $request->right_card_image->move(public_path('uploads/about'), $fileName);
            $story->right_card_image = 'uploads/about/' . $fileName;
        }

        $story->save();

        return redirect()->back();
    }
}
