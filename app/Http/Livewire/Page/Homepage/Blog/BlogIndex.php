<?php

namespace App\Http\Livewire\Page\Homepage\Blog;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class BlogIndex extends Component
{
    public $search = '';
    public $publish = '';
    public $status = '';
    protected $queryString = [
        'search' => ['except' => ''],
        'publish' => ['except' => ''],
        'status' => ['except' => ''],
    ];

    public function render()
    {

        if (!is_null($this->search)) {
            $data = Blog::when($this->search, function (Builder $query) {
                $query->where('blog_name', 'like', '%' . $this->search . '%');
            })
                ->when($this->publish, function (Builder $query) {
                    $query->where('publish_date', 'like', '%' .  $this->publish . '%');
                })
                ->when($this->status, function (Builder $query) {
                    $query->where('status', $this->status);
                })->latest()->paginate(9);
        }

        return view('livewire.page.homepage.blog.blog-index', [
            'blogs' => $data,
        ])->extends('layouts.homepage.index')
            ->section('content');;
    }
}
