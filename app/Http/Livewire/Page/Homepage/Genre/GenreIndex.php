<?php

namespace App\Http\Livewire\Page\HomePage\Genre;

use App\Models\ComicGenre;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class GenreIndex extends Component
{
    public $search = '';
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function render()
    {
        $data = ComicGenre::when($this->search, function (Builder $query) {
            $query->where('genre_name', 'like', '%' . $this->search . '%');
        })->get();

        return view('livewire.page.homepage.genre.genre-index', compact(['data']))
            ->extends('layouts.homepage.index')
            ->section('content');
    }
}
