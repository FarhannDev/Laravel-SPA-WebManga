<?php

namespace App\Http\Livewire\Page\Homepage\Blog;

use App\Models\Blog;
use Livewire\Component;

class BlogIndex extends Component
{
    public function render()
    {
        $blogs  = Blog::all();
        return view('livewire.page.homepage.blog.blog-index', [
            'blogs' => $blogs,
        ])->extends('layouts.homepage.index')
            ->section('content');;
    }
}
