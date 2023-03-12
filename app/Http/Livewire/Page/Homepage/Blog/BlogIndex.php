<?php

namespace App\Http\Livewire\Page\Homepage\Blog;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class BlogIndex extends Component
{
    public $search = '';
    public $publish = '';
    public $status = '';
    public $author = '';
    protected $queryString = [
        'search' => ['except' => ''],
        'publish' => ['except' => ''],
        'status' => ['except' => ''],
        'author' => ['except' => ''],
    ];

    public function render()
    {

        if (!is_null($this->search)) {
            $data = Blog::when($this->search, function (Builder $query) {
                $query->where('blog_name', 'like', '%' . $this->search . '%');
            })
                ->when($this->publish, function (Builder $query) {
                    $query->where('created_at', 'like', '%' .  $this->publish . '%');
                })

                ->when($this->author, function (Builder $query) {
                    $query->whereHas('user', function (Builder $q) {
                        $q->where('name', 'like', '%' . $this->author . '%');
                    });
                })->with('user')->latest()->paginate(9);
            // ->when($this->status, function (Builder $query) {
            //     $query->where('status', $this->status);
            // })
        }

        return view('livewire.page.homepage.blog.blog-index', [
            'blogs' => $data,
            'authors' => User::all(),
        ])->extends('layouts.homepage.index')
            ->section('content');;
    }
}
