<?php

namespace App\Livewire;

use App\Models\Theme;
use Livewire\Component;
use Livewire\WithPagination;

class ThemesList extends Component
{
    use WithPagination;
    public function render()
    {
        $themes = Theme::paginate(5);

        return view('livewire.themes-list', ['themes' => $themes]);
    }
}
