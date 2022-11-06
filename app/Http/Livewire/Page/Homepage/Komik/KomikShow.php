<?php

namespace App\Http\Livewire\Page\Homepage\Komik;

use App\Models\Comic;
use App\Models\ComicVolume;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class KomikShow extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

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
    }

    public function render()
    {
        $volumes =  ComicVolume::where('comic_id', $this->comic_id)->paginate(5);

        return view('livewire.page.homepage.komik.komik-show', ['volumes' => $volumes])
            ->extends('layouts.homepage.index')
            ->section('content');
    }
}
