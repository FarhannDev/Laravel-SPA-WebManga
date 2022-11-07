<?php

namespace App\Http\Livewire\Page\Homepage;

use Livewire\Component;

class TestimonialIndex extends Component
{
    public function render()
    {
        return view('livewire.page.homepage.testimonial-index')
            ->extends('layouts.homepage.index')
            ->section('content');
    }
}
