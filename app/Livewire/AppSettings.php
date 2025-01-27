<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Settings;

class AppSettings extends Component
{
    public $max_site;
    public $active_directory;

    protected $rules = [
        'max_site' => 'required|numeric|between:0,255',
        'active_directory' => [
            'required',
            'string',
            'regex:/^[A-Za-z]:\/[\\\\a-zA-Z0-9_.-]+(\/[\\\\a-zA-Z0-9_.-]+)*$/',
        ],
    ];

    public function mount()
    {
        $settings = Settings::find(1);
        if ($settings) {
            $this->max_site = $settings->max_site;
            $this->active_directory = $settings->active_directory;
        }
    }

    public function submit()
    {
        $this->validate();

        $settings = Settings::find(1);

        if ($settings) {
            $settings->update([
                "max_site" => $this->max_site,
                "active_directory" => $this->active_directory,
            ]);
            session()->flash('success', 'Settings updated successfully.');
        } else {
            Settings::create([
                "max_site" => $this->max_site,
                "active_directory" => $this->active_directory,
            ]);
            session()->flash('success', 'Settings created successfully.');
        }
    }

    public function render()
    {
        return view('livewire.app-settings');
    }
}
