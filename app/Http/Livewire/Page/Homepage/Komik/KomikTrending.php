<?php

namespace App\Http\Livewire\Page\Homepage\Komik;

use App\Models\Comic;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class KomikTrending extends Component
{
    public function render()
    {
        $data = Comic::when($this->search, function (Builder $query) {
            $query->where('comic_title', 'like', '%' . $this->search . '%');
        })->inRandomOrder()->paginate(12);

        return view('livewire..page.homepage.komik.komik-trending');
    }
}
