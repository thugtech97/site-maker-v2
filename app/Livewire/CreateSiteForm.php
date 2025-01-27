<?php

namespace App\Livewire;

use Exception;
use App\Models\Site;
use App\Models\Theme;
use App\Models\Module;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CreateSiteForm extends Component
{
    use WithFileUploads;

    public $company;
    public $website_name;
    public $url;
    public $contact_person;
    public $contact_number;
    public $email;
    public $website_logo;
    public $themes;
    public $theme_id;
    public $modules;
    public $module_ids = [];

    protected $listeners = ['setModuleIds'];

    protected $rules = [
        'company' => 'required|string|max:255',
        'website_name' => 'required|string|max:255',
        'url' => 'required|string|max:255|unique:sites,url',
        'contact_person' => 'required|string|max:255',
        'contact_number' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:sites,email',
        'website_logo' => 'required|image|max:1024',
        'theme_id' => 'required|exists:themes,id',
        'module_ids' => 'array|required',
        'module_ids.*' => 'exists:modules,id',
    ];

    public function submit()
    {
        $this->validate();

        try {
            $logoPath = null;

            $site = Site::create([
                'company' => $this->company,
                'website_name' => $this->website_name,
                'url' => $this->url,
                'contact_person' => $this->contact_person,
                'contact_number' => $this->contact_number,
                'email' => $this->email,
                'theme_id' => $this->theme_id,
                'user_id' => Auth::id(),
                'status' => 'DRAFT',
            ]);
            $site->modules()->sync($this->module_ids);
            if ($this->website_logo) {
                $logoPath = $this->website_logo->store("website/{$site->id}", 'public');
                $site->update(['logo' => $logoPath]);
            }
        
            session()->flash('success', 'Site created successfully!');
            return redirect()->route('sites.index');
        } catch (Exception $e) {
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
        }        
    }

    public function setModuleIds($values)
    {
        $this->module_ids = $values;
    }

    public function mount()
    {
        $this->themes = Theme::all();
        $this->modules = Module::all();
        // Add IDs of pre-selected modules here
        $this->module_ids = [1, 2, 3, 4, 5, 6, 7, 8];
    }

    public function render()
    {
        return view('livewire.create-site-form');
    }
}
