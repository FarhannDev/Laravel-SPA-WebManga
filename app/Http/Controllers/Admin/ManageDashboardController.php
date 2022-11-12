<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comic;
use App\Models\User;
use Illuminate\Http\Request;

class ManageDashboardController extends Controller
{
    public function index()
    {
        $total_komik = Comic::count();
        $total_artikel = Blog::count();
        $total_komunitas = User::count();

        return view('pages.admin.dashboard.index', compact(['total_komik', 'total_artikel', 'total_komunitas']));
    }
}
