<?php

namespace App\Livewire\Theme;

use App\Models\Theme;
use Livewire\Component;
use Livewire\WithPagination;

class ThemesList extends Component
{
    use WithPagination;
    public function render()
    {
        $themes = Theme::paginate(5);

        return view('livewire.theme.themes-list', ['themes' => $themes]);
    }
}
