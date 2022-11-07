<?php

namespace App\Http\Livewire\Page\Homepage\Blog;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class BlogIndex extends Component
{
    public $search = '';
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function render()
    {

        if (!is_null($this->search)) {
            $data = Blog::when($this->search, function (Builder $query) {
                $query->where('blog_name', 'like', '%' . $this->search . '%');
                $query->orWhere('blog_desc', 'like', '%' . $this->search . '%');
            })->latest()->paginate(9);
        }

        return view('livewire.page.homepage.blog.blog-index', [
            'blogs' => $data,
        ])->extends('layouts.homepage.index')
            ->section('content');;
    }
}
