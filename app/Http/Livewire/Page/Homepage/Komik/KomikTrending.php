<?php

namespace App\Http\Livewire\Page\Homepage\Komik;

use App\Models\Comic;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class KomikTrending extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $selected_genre;
    public $selected_status;
    protected $queryString = [
        'search' => ['except' => ''],
        'selected_genre' => ['except' => ''],
        'selected_status' => ['except' => ''],
    ];
    public function render()
    {
        $querySearch = $this->search;
        $querySelectedGenre = $this->selected_genre;
        $querySelectedStatus = $this->selected_status;

        (!is_null($querySearch) ? $querySearch : []);
        (!is_null($querySelectedGenre) ? $querySelectedGenre : []);
        (!is_null($querySelectedStatus) ? $querySelectedStatus : []);

        if (!is_null($this->search)) {
            $data = Comic::when($this->search, function (Builder $query) {
                $query->where('comic_title', 'like', '%' . $this->search . '%');
            })
                ->when($this->selected_genre, function (Builder $query) {
                    $query->where('comic_genre', 'like', '%' . $this->selected_genre . '%');
                })
                ->when($this->selected_status, function (Builder $query) {
                    $query->where('comic_status', $this->selected_status);
                })->orderBy('comic_title', 'DESC')->latest()->paginate(16);

            return view('livewire..page.homepage.komik.komik-trending')
                ->extends('layouts.homepage.index')
                ->section('content')
        }
    }
}
