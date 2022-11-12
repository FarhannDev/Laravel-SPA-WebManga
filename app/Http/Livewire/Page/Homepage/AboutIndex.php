<?php

namespace App\Http\Livewire\Page\Homepage;

use App\Models\Service;
use Livewire\Component;
use App\Models\ComicGenre;

class AboutIndex extends Component
{
    public function render()
    {
        $genres = ComicGenre::all();
        return view('livewire.page.homepage.about-index', compact(['genres']))
            ->extends('layouts.homepage.index')
            ->section('content');;
    }
}
