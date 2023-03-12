<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comic;
use App\Models\ComicVolume;
use App\Models\User;
use Illuminate\Http\Request;

class ManageDashboardController extends Controller
{
    public function index()
    {
        $total_komik = Comic::count();
        $total_artikel = Blog::count();
        $total_blog_publish = Blog::where('status', 'Publish')->count();
        $total_blog_unpublish = Blog::where('status', 'Unpublish')->count();
        $total_volume = ComicVolume::count();

        return view('pages.admin.dashboard.index', compact(['total_komik', 'total_artikel', 'total_blog_unpublish', 'total_blog_publish', 'total_volume']));
    }
}
