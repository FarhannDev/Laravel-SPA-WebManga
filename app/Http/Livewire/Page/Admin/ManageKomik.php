<?php

namespace App\Http\Livewire\Page\Admin;

use App\Models\Comic;
use Livewire\Component;
use Livewire\WithPagination;

class ManageKomik extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $comics = Comic::paginate(10);

        return view('livewire.page.admin.manage-komik', ['comics' => $comics])
            ->extends('layouts.dashboard.index')
            ->section('container');
    }
}
