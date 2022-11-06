<?php

namespace App\Http\Livewire\Page\Homepage\Komik;

use Livewire\Component;

class KomikLatest extends Component
{
    public function render()
    {
        $comics = Comic::orderBy('comic_title', 'DESC')->latest()->paginate(9);
        return view('livewire.page.homepage.komik.komik-latest', ['comics' => $comics])->extends('layouts.homepage.index')
            ->section('content');;
    }
}
