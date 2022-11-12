<?php

namespace App\Http\Livewire\Page\Homepage\Komik;

use Livewire\Component;

class KomikVidio extends Component
{
    public function render()
    {
        return view('livewire.page.homepage.komik.komik-vidio')
            ->extends('layouts.homepage.index')
            ->section('content');
    }
}
