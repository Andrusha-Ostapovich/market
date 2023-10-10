<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SitemapController extends Controller
{
    public function viewSitemap()
    {
        Artisan::call('sitemap:generate');
        $sitemapPath = public_path('sitemap.xml');
        if (file_exists($sitemapPath)) {
            $content = file_get_contents($sitemapPath);
            return response($content, 200)->header('Content-Type', 'text/xml');
        } else {
            abort(404);
        }
    }
}
