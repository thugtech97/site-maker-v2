<?php

namespace App\Livewire\Site;

use App\Models\Site;
use App\Models\Theme;
use App\Models\Module;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditSiteForm extends Component
{
    use WithFileUploads;

    public $site;
    public $company;
    public $website_name;
    public $url;
    public $contact_person;
    public $contact_number;
    public $email;
    public $website_logo;
    public $theme_id;
    public $module_ids = [];

    public $themes;
    public $modules;

    public function mount($siteId)
    {
        $this->site = Site::findOrFail($siteId);

        $this->company = $this->site->company;
        $this->website_name = $this->site->website_name;
        $this->url = $this->site->url;
        $this->contact_person = $this->site->contact_person;
        $this->contact_number = $this->site->contact_number;
        $this->email = $this->site->email;
        $this->theme_id = $this->site->theme_id;
        $this->module_ids = $this->site->modules->pluck('id')->toArray(); // related modules
        
        $this->themes = Theme::all();
        $this->modules = Module::all();
    }

    public function submit()
    {
        $this->validate([
            'company' => 'required|string|max:255',
            'website_name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'theme_id' => 'required|exists:themes,id',
            'module_ids' => 'array',
            'module_ids.*' => 'exists:modules,id',
            'website_logo' => 'nullable|image|max:2048',
        ]);

        if ($this->website_logo) {
            $logoPath = $this->website_logo->store("website/{$site->id}", 'public');
            $this->site->logo = $logoPath;
        }

        $this->site->update([
            'company' => $this->company,
            'website_name' => $this->website_name,
            'url' => $this->url,
            'contact_person' => $this->contact_person,
            'contact_number' => $this->contact_number,
            'email' => $this->email,
            'theme_id' => $this->theme_id,
        ]);

        $this->site->modules()->sync($this->module_ids);
        session()->flash('success', 'Site updated successfully.');
        return redirect()->route('sites.index');
    }

    public function render()
    {
        return view('livewire.site.edit-site-form');
    }
}
