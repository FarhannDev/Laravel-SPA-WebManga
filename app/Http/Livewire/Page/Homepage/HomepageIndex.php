<?php

namespace App\Http\Livewire\Page\Homepage;

use Livewire\Component;

class HomepageIndex extends Component
{
    public function render()
    {
        return view('livewire.page.homepage.homepage-index')
            ->extends('layouts.homepage.index')
            ->section('content');
    }
}
