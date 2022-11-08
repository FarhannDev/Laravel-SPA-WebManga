<?php

namespace App\Http\Livewire\Page\Homepage;

use App\Models\Blog;
use App\Models\Comic;
use App\Models\ComicGenre;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class HomepageIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $genres = ComicGenre::all();
        $comics = Comic::orderBy('comic_title')->latest()->paginate(3);
        $services = Service::all();
        $blog = Blog::latest()->paginate(3);

        $comic_latest = Comic::latest()->paginate(4);
        $comic_populer = Comic::where('comic_author', 'Hiroyuki')->latest()->paginate(3);
        $comic_romantis  =  Comic::where('comic_genre_id', 2)->latest()->paginate(6);
        $comic_fantasi  =  Comic::where('comic_genre_id', 7)->latest()->paginate(6);

        return view('livewire.page.homepage.homepage-index', [
            'genres' => $genres,
            'comics' => $comics,
            'comic_latest' => $comic_latest,
            'comic_populer' => $comic_populer,
            'comic_romantis' => $comic_romantis,
            'comic_fantasi' => $comic_fantasi,
            'services' => $services,
            'blog'   => $blog,
        ])
            ->extends('layouts.homepage.index')
            ->section('content');
    }
}
