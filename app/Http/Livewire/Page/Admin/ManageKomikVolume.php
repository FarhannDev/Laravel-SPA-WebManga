<?php

namespace App\Http\Livewire\Page\Admin;

use Livewire\Component;

class ManageKomikVolume extends Component
{
    public function render()
    {
        return view('livewire.page.admin.manage-komik-volume')->extends('layouts.dashboard.index')
            ->section('content');;
    }
}
