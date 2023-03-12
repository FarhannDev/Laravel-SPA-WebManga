<?php

namespace App\Http\Livewire\Page\Homepage;

use App\Models\Blog;
use App\Models\Comic;
use App\Models\ComicGenre;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class HomepageIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $comics = Comic::orderBy('comic_title')->latest()->paginate(3);
        $comic_latest = Comic::latest()->paginate(4);
        $count_comic = Comic::count();
        $count_genre = ComicGenre::count();
        $count_users = User::all()->count();
        $count_blog = Blog::where('status', 'Publish')->count();
        $blogs = Blog::latest()->paginate(3);
        $trending  = Comic::where('status', 'Publish')->inRandomOrder()->limit(4)->get();
        $populer  = Comic::where('comic_rating', '>', '8.0')->inRandomOrder()->limit(4)->get();

        return view('livewire.page.homepage.homepage-index', [
            'comics' => $comics,
            'comic_latest' => $comic_latest,
            'count_comic'  => $count_comic,
            'count_genre'  => $count_genre,
            'count_users'  => $count_users,
            'count_blog'  => $count_blog,
            'blogs'       => $blogs,
            'trending'    => $trending,
            'populer'    => $populer,
        ])
            ->extends('layouts.homepage.index')
            ->section('content');
    }
}
