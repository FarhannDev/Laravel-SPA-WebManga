<?php

namespace App\Http\Livewire\Page\Homepage\Blog;

use App\Models\Blog;
use Livewire\Component;

class BlogShow extends Component
{
    public $blog_by_user;
    public $blog_name;
    public $blog_desc;
    public $blog_created;
    public $blog_status;
    public $blog_cover;
    public $status;
    public $publish_date;

    public function mount(Blog $blog)
    {
        $data = Blog::where('blog_slug', $blog->blog_slug)->first();

        if (!is_null($data)) {
            $this->blog_by_user         = $data->user['name'];
            $this->blog_name            = $data->blog_name;
            $this->blog_desc            = $data->blog_desc;
            $this->blog_created         = $data->created_at;
            $this->blog_status          = $data->status;
            $this->blog_cover           = $data->blog_cover;
            $this->status               = $data->status;
            $this->publish_date         = $data->publish_date;
        }
    }

    public function render()
    {
        return view('livewire.page.homepage.blog.blog-show')
            ->extends('layouts.homepage.index')
            ->section('content');
    }
}
