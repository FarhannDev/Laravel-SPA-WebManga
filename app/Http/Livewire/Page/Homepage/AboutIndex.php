<?php

namespace App\Http\Livewire\Page\Homepage;

use App\Models\Blog;
use App\Models\User;
use App\Models\Comic;
use Livewire\Component;
use App\Models\ComicGenre;

class AboutIndex extends Component
{
    public function render()
    {
        $genres = ComicGenre::all();
        $count_comic = Comic::count();
        $count_genre = ComicGenre::count();
        $count_users = User::all()->count();
        $count_blog = Blog::where('status', 'Publish')->count();

        return view('livewire.page.homepage.about-index', compact(['genres', 'count_comic', 'count_genre', 'count_blog']))
            ->extends('layouts.homepage.index')
            ->section('content');;
    }
}
