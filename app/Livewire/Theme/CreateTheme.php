<?php

namespace App\Livewire\Theme;

use Exception;
use App\Models\Theme;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateTheme extends Component
{
    use WithFileUploads;

    public $name;
    public $path;
    public $preview;

    protected $rules = [
        'name' => 'required|string|max:255|unique:themes,name',
        'path' => 'required|string|max:255',
        'preview' => 'required|image|max:5024',
    ];

    public function submit()
    {
        $this->validate();

        try {
            $logoPath = null;

            $theme = Theme::create([
                'name' => $this->name,
                'path' => $this->path,
            ]);

            if ($this->preview) {
                $logoPath = $this->preview->store("theme/{$theme->id}", 'public');
                $theme->update(['preview' => $logoPath]);
            }
        
            session()->flash('success', 'Theme created successfully!');
            return redirect()->route('themes.index');
        } catch (Exception $e) {
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
        }        
    }

    public function render()
    {
        return view('livewire.theme.create-theme');
    }
}
