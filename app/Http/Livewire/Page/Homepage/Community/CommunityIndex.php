<?php

namespace App\Http\Livewire\Page\Homepage\Community;

use App\Models\Community;
use Livewire\Component;

class CommunityIndex extends Component
{
    public $user_id;
    public $description;

    protected $rules = [
        'description' => 'required',
    ];

    public function send()
    {

        Community::create([
            'user_id'        => 1,
            'description'    => $this->description,
            'created_at'     => new \DateTime(),
            'updated_at'     => new \DateTime(),
        ]);


        // Community::create([
        //     'user_id'        => 1,
        //     'description'    => $this->description,
        //     'created_at'     => new \DateTime(),
        //     'updated_at'     => new \DateTime(),
        // ]);
    }

    public function render()
    {
        return view('livewire.page.homepage.community.community-index')
            ->extends('layouts.homepage.index')
            ->section('content');
    }
}
