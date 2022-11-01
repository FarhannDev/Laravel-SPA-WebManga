<?php

namespace App\Http\Livewire\Page\Homepage;

use Livewire\Component;

class AboutIndex extends Component
{
    public function render()
    {
        return view('livewire.page.homepage.about-index')
            ->extends('layouts.homepage.index')
            ->section('content');;
    }
}
