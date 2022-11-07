<?php

namespace App\Http\Livewire\Page\Homepage\Komik;

use App\Models\Comic;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class KomikLatest extends Component
{
    public $search = '';
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function mount(Comic $comic)
    {
    }

    public function render()
    {
        $data = Comic::when($this->search, function (Builder $query) {
            $query->where('comic_title', 'like', '%' . $this->search . '%');
        });

        // $data = Comic::$comics = Comic::orderBy('comic_title', 'DESC')->latest()->paginate(9);
        return view('livewire.page.homepage.komik.komik-latest', ['comics' => $data])->extends('layouts.homepage.index')
            ->section('content');
    }
}
