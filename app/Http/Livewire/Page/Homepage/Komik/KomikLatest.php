<?php

namespace App\Http\Livewire\Page\Homepage\Komik;

use App\Models\Comic;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class KomikLatest extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function render()
    {
        $data = Comic::when($this->search, function (Builder $query) {
            $query->where('comic_title', 'like', '%' . $this->search . '%');
        })->inRandomOrder()->paginate(12);

        // $data = Comic::$comics = Comic::orderBy('comic_title', 'DESC')->latest()->paginate(9);
        return view('livewire.page.homepage.komik.komik-latest', ['data' => $data])->extends('layouts.homepage.index')
            ->section('content');
    }
}
