<?php

namespace App\Http\Livewire\Page\Homepage\Komik;

use App\Models\Comic;
use Livewire\Component;

class KomikIndex extends Component
{
    public function render()
    {
        $comics = Comic::orderBy('comic_title', 'DESC')->latest()->paginate(9);

        return view('livewire.page.homepage.komik.komik-index', [
            'comics' => $comics,
        ])
            ->extends('layouts.homepage.index')
            ->section('content');
    }
}
