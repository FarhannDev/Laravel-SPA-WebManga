<?php

namespace App\Http\Livewire\Page\Homepage\Blog;

use App\Models\Blog;
use App\Models\BlogComment;
use Livewire\Component;
use Livewire\WithPagination;

class BlogShow extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $blog_by_user;
    public $blog_name;
    public $blog_desc;
    public $blog_created;
    public $blog_status;
    public $blog_cover;
    public $blog_cover_link;
    public $status;
    public $publish_date;

    public $blog_id;
    public $comment_name;
    public $comment_email;
    public $comment_desc;
    protected $rules = [
        'comment_name' => 'required',
        'comment_email' => 'required|email',
        'comment_desc'  => 'required',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

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
            $this->blog_cover_link      = $data->blog_cover_link;
            $this->status               = $data->status;
            $this->publish_date         = $data->publish_date;

            $this->blog_id              = $data->id;
        }
    }

    public function sendComment()
    {
        $this->validate();

        BlogComment::create([
            'blog_id'       => $this->blog_id,
            'comment_name' => $this->comment_name,
            'comment_email' => $this->comment_email,
            'comment_desc' => $this->comment_desc,
            'created_at'   => new \DateTime(),
            'updated_at'   => new \DateTime(),
        ]);

        $this->comment_name = '';
        $this->comment_email = '';
        $this->comment_desc = '';
    }

    public function render()
    {
        $blog_comment = BlogComment::where('blog_id', $this->blog_id)->latest()->paginate(6);

        return view('livewire.page.homepage.blog.blog-show', compact(['blog_comment']))
            ->extends('layouts.homepage.index')
            ->section('content');
    }
}
