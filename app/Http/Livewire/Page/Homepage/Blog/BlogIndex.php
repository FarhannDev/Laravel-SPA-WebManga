<?php

namespace App\Http\Livewire\Page\Homepage\Blog;

use Livewire\Component;

class BlogIndex extends Component
{
    public function render()
    {
        return view('livewire.page.homepage.blog.blog-index')->extends('layouts.homepage.index')
            ->section('content');;
    }
}
