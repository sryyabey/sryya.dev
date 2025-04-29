<?php

namespace App\Http\Controllers;

use App\Models\CmsPage;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        $pages = CmsPage::where('is_published', true)
            ->with('category')
            ->get();
        return view('welcome', compact('settings', 'pages'));
    }
}
