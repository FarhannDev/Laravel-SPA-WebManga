<?php

namespace App\Http\Livewire\Page\Homepage\Komik;

use App\Models\Comic;
use App\Models\ComicVolume;
use Livewire\Component;

class KomikShow extends Component
{

    public $comic_id;
    public $comic_genre;
    public $comic_title;
    public $comic_author;
    public $comic_artist;
    public $comic_rating;
    public $comic_released;
    public $comic_cover;
    public $comic_alternative;
    public $comic_sinopsis;

    public $volumes = null;

    public function mount(Comic $comic)
    {
        $data = Comic::where('comic_slug', $comic->comic_slug)->first();

        if (!is_null($data)) {
            $this->comic_id              = $data->id;
            $this->comic_genre           = $data->genre['genre_name'];
            $this->comic_title           = $data->comic_title;
            $this->comic_author          = $data->comic_author;
            $this->comic_artist          = $data->comic_artist;
            $this->comic_rating          = $data->comic_rating;
            $this->comic_released        = $data->comic_released;
            $this->comic_cover           = $data->comic_cover;
            $this->comic_alternative     = $data->comic_alternative;
            $this->comic_sinopsis        = $data->comic_sinopsis;
        }

        $this->volumes = ComicVolume::where('comic_id', $this->comic_id)->orderBy('volume_name', 'DESC')->get();

        if (!is_null($this->volumes)) return $this->volumes;
    }

    public function render()
    {
        return view('livewire.page.homepage.komik.komik-show')
            ->extends('layouts.homepage.index')
            ->section('content');
    }
}
