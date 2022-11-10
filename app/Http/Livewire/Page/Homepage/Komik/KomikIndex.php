<?php

namespace App\Http\Livewire\Page\Homepage\Komik;

use App\Models\Comic;
use App\Models\ComicGenre;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Livewire\Component;
use Livewire\WithPagination;

class KomikIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $selectedGenre;
    protected $queryString = [
        'search' => ['except' => ''],
        'selectedGenre' => ['except' => ''],
    ];


    public function render()
    {
        $querySearch = $this->search;
        $querySelectedGenre = $this->selectedGenre;

        (!is_null($querySearch) ? $querySearch : []);
        (!is_null($querySelectedGenre) ? $querySelectedGenre : []);

        if (!is_null($this->search)) {
            $data = Comic::when($this->search, function (Builder $query) {
                $query->where('comic_title', 'like', '%' . $this->search . '%');
            })
                ->when($this->selectedGenre, function (Builder $query) {
                    $query->whereHas('genre', function (Builder $q) {
                        $q->where('genre_name', 'like', '%' . $this->selectedGenre . '%');
                    });
                })
                ->with('genre')->orderBy('comic_title', 'DESC')->latest()->paginate(16);
        }

        return view('livewire.page.homepage.komik.komik-index', [
            'data' => $data,
            'genres' => ComicGenre::all(),
        ])
            ->extends('layouts.homepage.index')
            ->section('content');
    }
}
