<?php

namespace App\Http\Livewire\Page\Admin\Komik;

use App\Models\Comic;
use Livewire\Component;
use App\Models\ComicGenre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class ManageKomikAdd extends Component
{
    use WithFileUploads;

    public $genre;

    public $comic_genre_id;
    public $comic_title;
    public $comic_slug;
    public $comic_author;
    public $comic_artist;
    public $comic_rating;
    public $comic_released;
    public $comic_cover;
    public $comic_alternative;
    public $comic_sinopsis;
    public $is_active;

    public function mount()
    {
        $this->genre = ComicGenre::all();
    }

    protected $rules = [
        'comic_title' => 'required|min:6|max:100',
        'comic_artist' => 'required',
        'comic_author' => 'required',
        'comic_genre_id' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function store()
    {
        $this->validate();

        $generate_slug = Str::slug($this->comic_title, '-');
        $generate_slug .= '.html';

        Comic::create([
            'comic_genre_id'         => $this->comic_genre_id,
            'comic_title'            => $this->comic_title,
            'comic_slug'             => $generate_slug,
            'comic_author'           => $this->comic_author,
            'comic_artist'           => $this->comic_artist,
            'comic_rating'           => $this->comic_rating,
            'comic_released'         => $this->comic_released,
            'comic_cover'            => 'default-komik.jpg',
            'comic_alternative'      => $this->comic_alternative,
            'comic_sinopsis'         => $this->comic_sinopsis,
            'is_active'              => 'Publish',
            'created_at'             => new \DateTime(),
            'updated_at'             => new \DateTime(),
        ]);

        return redirect()->route('manageKomik')
            ->with('message_success', 'Successfully Added comic');
    }

    public function render()
    {
        return view('livewire.page.admin.komik.manage-komik-add')
            ->extends('layouts.dashboard.index')
            ->section('container');
    }
}
