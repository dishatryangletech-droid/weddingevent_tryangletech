<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutPageTeam;
use App\Models\AboutPageTeamItem;

class AboutTeamController extends Controller
{
    public function index()
    {
        $teamHeader = AboutPageTeam::first();
        $teamMembers = AboutPageTeamItem::orderBy('sort_order', 'asc')->get();
        return view('backend.about.team.index', compact('teamHeader', 'teamMembers'));
    }

    public function updateHeader(Request $request)
    {
        $header = AboutPageTeam::first() ?? new AboutPageTeam();
        $header->tagline = $request->tagline;
        $header->title = $request->title;
        $header->description = $request->description;
        $header->button_text = $request->button_text;
        $header->button_link = $request->button_link;

        if ($request->hasFile('video_poster')) {
            $fileName = time() . '_team_poster.' . $request->video_poster->extension();
            $request->video_poster->move(public_path('uploads/about'), $fileName);
            $header->video_poster = 'uploads/about/' . $fileName;
        }

        if ($request->hasFile('video_mp4')) {
            $fileName = time() . '_team_mp4.' . $request->video_mp4->extension();
            $request->video_mp4->move(public_path('uploads/about'), $fileName);
            $header->video_mp4 = 'uploads/about/' . $fileName;
        }

        if ($request->hasFile('video_webm')) {
            $fileName = time() . '_team_webm.' . $request->video_webm->extension();
            $request->video_webm->move(public_path('uploads/about'), $fileName);
            $header->video_webm = 'uploads/about/' . $fileName;
        }

        $header->save();

        return redirect()->back();
    }

    public function storeMember(Request $request)
    {
        $member = new AboutPageTeamItem();
        $member->name = $request->name;
        $member->designation = $request->designation;
        $member->facebook = $request->facebook;
        $member->twitter = $request->twitter;
        $member->linkedin = $request->linkedin;
        $member->sort_order = AboutPageTeamItem::max('sort_order') + 1;

        if ($request->hasFile('image')) {
            $fileName = time() . '_team.' . $request->image->extension();
            $request->image->move(public_path('uploads/about'), $fileName);
            $member->image = 'uploads/about/' . $fileName;
        }

        $member->save();

        return redirect()->back();
    }

    public function deleteMember($id)
    {
        AboutPageTeamItem::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function reorderMembers(Request $request)
    {
        $order = $request->input('order');
        if (is_array($order)) {
            foreach ($order as $index => $id) {
                AboutPageTeamItem::where('id', $id)->update(['sort_order' => $index + 1]);
            }
        }
        return response()->json(['success' => true]);
    }
}
