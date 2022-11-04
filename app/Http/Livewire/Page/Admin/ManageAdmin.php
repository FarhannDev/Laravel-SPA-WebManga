<?php

namespace App\Http\Livewire\Page\Admin;

use Livewire\Component;

class ManageAdmin extends Component
{
    public function render()
    {
        return view('livewire.page.admin.manage-admin')
            ->extends('layouts.dashboard.index')
            ->section('content');
    }
}
