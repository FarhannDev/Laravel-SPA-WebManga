<?php

namespace App\Http\Livewire\Page\Homepage\Komik;

use Livewire\Component;

class KomikShow extends Component
{
    public function render()
    {
        return view('livewire.page.homepage.komik.komik-show')
            ->extends('layouts.homepage.index')
            ->section('content');
    }
}
