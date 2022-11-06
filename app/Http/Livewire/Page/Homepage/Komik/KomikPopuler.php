<?php

namespace App\Http\Livewire\Page\Homepage\Komik;

use Livewire\Component;

class KomikPopuler extends Component
{
    public function render()
    {
        return view('livewire.page.homepage.komik.komik-populer')->extends('layouts.homepage.index')
            ->section('content');;
    }
}
