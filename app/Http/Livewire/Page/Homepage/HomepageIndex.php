<?php

namespace App\Http\Livewire\Page\Homepage;

use App\Models\Comic;
use App\Models\ComicGenre;
use Livewire\Component;

class HomepageIndex extends Component
{
    public function render()
    {
        $genres = ComicGenre::all();
        $comics = Comic::latest()->paginate(3);


        return view('livewire.page.homepage.homepage-index', [
            'genres' => $genres,
            'comics' => $comics
        ])
            ->extends('layouts.homepage.index')
            ->section('content');
    }
}
