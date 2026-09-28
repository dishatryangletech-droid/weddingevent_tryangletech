<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;

class PlaceholderController extends Controller
{
    public function services()
    {
        return view('backend.placeholders.index', [
            'title' => 'Services Management',
            'icon' => 'layers',
            'desc' => 'Manage all 11 White Energy services, content, and imagery for the website.',
            'module' => 'Services',
        ]);
    }

    public function portfolio()
    {
        return view('backend.placeholders.index', [
            'title' => 'Portfolio Management',
            'icon' => 'briefcase',
            'desc' => 'Manage past engineering and multimedia installation projects.',
            'module' => 'Portfolio',
        ]);
    }

    public function blog()
    {
        return view('backend.placeholders.index', [
            'title' => 'Blog Posts Management',
            'icon' => 'file-text',
            'desc' => 'Create, edit, and publish industry insights and company updates.',
            'module' => 'Blog',
        ]);
    }

    public function users()
    {
        $users = User::orderBy('id', 'desc')->get();

        return view('backend.users.index', compact('users'));
    }
}
