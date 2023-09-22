<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $page = Page::firstWhere(['slug' => 'home']);

        return view('user.pages.' . $page->template, ['page' => $page]);
    }

    public function show($slug)
    {
        $page = Page::firstWhere(['slug' => $slug]);

        return view('user.pages.' . $page->template, ['page' => $page]);
    }
}
