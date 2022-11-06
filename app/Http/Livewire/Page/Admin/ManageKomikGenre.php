<?php

namespace App\Http\Livewire\Page\Admin;

use Livewire\Component;

class ManageKomikGenre extends Component
{
    public function render()
    {
        return view('livewire.page.admin.manage-komik-genre')->extends('layouts.dashboard.index')
            ->section('content');;
    }
}
