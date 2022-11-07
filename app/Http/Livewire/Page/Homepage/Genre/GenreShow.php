<?php

namespace App\Http\Livewire\Page\HomePage\Genre;

use App\Models\Comic;
use App\Models\ComicGenre;

use Livewire\Component;
use Illuminate\Http\Request;

class GenreShow extends Component
{
    public $genre_id;
    public $genre_name;



    public function mount(ComicGenre $comicGenre)
    {
        $data = ComicGenre::where('genre_slug', $comicGenre->genre_slug)->first();

        if (!is_null($data)) {
            $this->genre_id         = $data->id;
            $this->genre_name       = $data->genre_name;
        }
    }

    public function render()
    {
        $comics = Comic::where('comic_genre_id', $this->genre_id)->orderBy('comic_title', 'DESC')->latest()->paginate(9);

        return view('livewire.page.homepage.genre.genre-show', ['comics' => $comics])
            ->extends('layouts.homepage.index')
            ->section('content');
    }
}
