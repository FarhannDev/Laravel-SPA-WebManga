<?php

namespace App\Http\Livewire\Page\Homepage\Komik;

use App\Models\Comic;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Livewire\Component;
use Livewire\WithPagination;

class KomikIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    protected $queryString = [
        'search' => ['except' => ''],
    ];


    public function render()
    {
        if (!is_null($this->search)) {
            $data = Comic::when($this->search, function (Builder $query) {
                $query->where('comic_title', 'like', '%' . $this->search . '%');
            })->orderBy('comic_title', 'DESC')->latest()->paginate(9);
        }

        return view('livewire.page.homepage.komik.komik-index', [
            'data' => $data,
        ])
            ->extends('layouts.homepage.index')
            ->section('content');
    }
}
