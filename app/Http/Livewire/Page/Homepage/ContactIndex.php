<?php

namespace App\Http\Livewire\Page\Homepage;

use Livewire\Component;

class ContactIndex extends Component
{
    public function render()
    {
        return view('livewire.page.homepage.contact-index')
            ->extends('layouts.homepage.index')
            ->section('content');
    }
}
